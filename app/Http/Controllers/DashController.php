<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class DashController extends BaseController
{

    public function index()
    {

        $network=file_get_contents('https://chain.so/api/v2/get_info/Dash');
        $network_status=json_decode($network);

        return view('dash.index',['network_status'=>$network_status]);    
    }

    public function blocks($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/dash/main/blocks/'.$id);
        $block=json_decode($data);
        $block->time=strtotime($block->time);
        $time = \Carbon\Carbon::createFromTimestamp($block->time);
        $block_time=$time->diffForHumans();

        return view('dash.block',['block'=>$block,'block_time'=>$block_time]);
    }

    public function address($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/dash/main/addrs/'.$id.'/full?limit=50');
        $address=json_decode($data);

        return view('dash.address',['address'=>$address,'id'=>$id]);
    }

    public function transaction($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/dash/main/txs/'.$id);
        $transaction=json_decode($data);

        return view('dash.transaction',['transaction'=>$transaction,'id'=>$id]);
    }

    public function search(Request $request)
    {
        $search_term=Input::get('search_string');

        try {
            file_get_contents('https://api.blockcypher.com/v1/dash/main/addrs/'.$search_term.'/full?limit=50');
            return redirect()->to('/dash/address/'.$search_term);
        }
        catch (\Exception $e) {


            try {
                file_get_contents('https://api.blockcypher.com/v1/dash/main/txs/'.$search_term);
                return redirect()->to('/dash/tx/'.$search_term);
            }

            catch (\Exception $e) {

                try {

                    file_get_contents('https://api.blockcypher.com/v1/dash/main/blocks/' . $search_term);
                    return redirect()->to('/dash/block/' . $search_term);
                }

                catch (\Exception $e) {
                    $request->session()->flash('error_msg', 'Not a valid Dash address, transaction or block');
                    return redirect()->back();
                }

            }


        }


    }
}




