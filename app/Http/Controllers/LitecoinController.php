<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class LitecoinController extends BaseController
{

    public function index()
    {
        $network=file_get_contents('https://insight.litecore.io/api/status');
        $network_status=json_decode($network);

        return view('litecoin.index',['network_status'=>$network_status]);    
    }

    public function blocks($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/ltc/main/blocks/'.$id);
        $block=json_decode($data);
        $block->time=strtotime($block->time);
        $time = \Carbon\Carbon::createFromTimestamp($block->time);
        $block_time=$time->diffForHumans();

        return view('litecoin.block',['block'=>$block,'block_time'=>$block_time]);
    }

    public function address($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/ltc/main/addrs/'.$id.'/full?limit=50');
        $address=json_decode($data);

        return view('litecoin.address',['address'=>$address,'id'=>$id]);
    }

    public function transaction($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/ltc/main/txs/'.$id);
        $transaction=json_decode($data);

        return view('litecoin.transaction',['transaction'=>$transaction,'id'=>$id]);
    }

    public function search(Request $request)
    {
        $search_term=Input::get('search_string');

        try {
            file_get_contents('https://api.blockcypher.com/v1/ltc/main/addrs/'.$search_term.'/full?limit=50');
            return redirect()->to('/ltc/address/'.$search_term);
        }
        catch (\Exception $e) {

            try {
                file_get_contents('https://api.blockcypher.com/v1/ltc/main/txs/'.$search_term);
                return redirect()->to('/ltc/tx/'.$search_term);
            }

            catch (\Exception $e) {

                try {

                    file_get_contents('https://api.blockcypher.com/v1/ltc/main/blocks/' . $search_term);
                    return redirect()->to('/ltc/block/' . $search_term);
                }

                catch (\Exception $e) {
                    $request->session()->flash('error_msg', 'Not a valid LTC address, transaction or block');
                    return redirect()->back();
                }


            }


        }


    }
}




