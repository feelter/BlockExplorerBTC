<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class BCHController extends BaseController
{

    public function index()

    {


        return view('BCH.index');

    }

    public function blocks($id)
    {
        $data=file_get_contents('https://blockdozer.com/api/block/'.$id);
        $block=json_decode($data);


        $time = \Carbon\Carbon::createFromTimestamp($block->time);
        $block_time=$time->diffForHumans();



        return view('BCH.block',['block'=>$block,'block_time'=>$block_time]);


    }



    public function address($id)
    {
        $data=file_get_contents('https://blockdozer.com/api/addr/'.$id);
        $address=json_decode($data);


        return view('BCH.address',['address'=>$address]);


    }

    public function transaction($id)
    {
        $data=file_get_contents('https://blockdozer.com/api/tx/'.$id);
        $transaction=json_decode($data);


        $time = \Carbon\Carbon::createFromTimestamp($transaction->time);
        $timestamp=$time->diffForHumans();


        return view('BCH.transaction',['transaction'=>$transaction,'timestamp'=>$timestamp]);


    }

    public function search(Request $request)
    {
        $search_term=Input::get('search_string');

        try {
            file_get_contents('https://blockdozer.com/api/addr/'.$search_term);
            return redirect()->to('/bch/address/'.$search_term);
        }
        catch (\Exception $e) {


            try {

                file_get_contents('https://blockdozer.com/api/tx/'.$search_term);

                return redirect()->to('/bch/tx/'.$search_term);
            }

            catch (\Exception $e) {

                try {

                    file_get_contents('https://blockdozer.com/api/block/'.$search_term);

                    return redirect()->to('/bch/block/'.$search_term);
                }

                catch (\Exception $e) {
                    $request->session()->flash('error_msg', 'Not a valid BCH address, transaction or block');

                    return redirect()->back();

                }

            }


        }



    }
}
