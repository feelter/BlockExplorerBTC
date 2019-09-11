<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class IndexController extends BaseController
{

    public function index()
    {
        return view('index');
    }


    public function blocks($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/btc/main/blocks/'.$id);
        $block=json_decode($data);
        $block->time=strtotime($block->time);
        $time = \Carbon\Carbon::createFromTimestamp($block->time);
        $block_time=$time->diffForHumans();

        return view('block',['block'=>$block,'block_time'=>$block_time]);
    }

    public function address($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/btc/main/addrs/'.$id.'/full?limit=50');
        $address=json_decode($data);

        return view('address',['address'=>$address,'id'=>$id]);
    }

    public function transaction($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/btc/main/txs/'.$id);
        $transaction=json_decode($data);

        return view('transaction',['transaction'=>$transaction,'id'=>$id]);
    }

    public function search(Request $request)
    {
        $search_term=Input::get('search_string');

        try {
            file_get_contents('https://api.blockcypher.com/v1/btc/main/addrs/'.$search_term.'/full?limit=50');
            return redirect()->to('/btc/address/'.$search_term);
        }
        catch (\Exception $e) {


            try {
                file_get_contents('https://api.blockcypher.com/v1/btc/main/txs/'.$search_term);
                return redirect()->to('/btc/tx/'.$search_term);
            }

            catch (\Exception $e) {

                $data = file_get_contents('https://chain.api.btc.com/v3/block/' . $search_term);
                $block_data=json_decode($data);
                if ($block_data->data != null) {
                    return redirect()->to('/btc/block/' . $search_term);

                } else {
                    $request->session()->flash('error_msg', 'Not a valid BTC address, transaction or block');

                    return redirect()->back();

                }

            }


        }


    }
}




