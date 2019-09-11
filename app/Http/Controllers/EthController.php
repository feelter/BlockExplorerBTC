<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class EthController extends BaseController
{

    public function index()
    {
        return view('ETH.index');
    }

    public function blocks($id)
    {
        $data=file_get_contents('https://api.blockcypher.com/v1/eth/main/blocks/'.$id);
        $block=json_decode($data);
        $block->time=strtotime($block->time);
        $time = \Carbon\Carbon::createFromTimestamp($block->time);
        $block_time=$time->diffForHumans();

        return view('ETH.block',['block'=>$block,'block_time'=>$block_time]);
    }


    public function address($id)
    {
        $data=file_get_contents('http://api.etherscan.io/api?module=account&action=txlist&address='.$id);
        $address=json_decode($data);
        $balance=file_get_contents('https://api.etherscan.io/api?module=account&action=balance&address='.$id);
        $balance_addr=json_decode($balance);
        $tx_count=count($address->result);

        return view('ETH.address',['address'=>$address,'id'=>$id,'balance'=>$balance_addr,'tx_count'=>$tx_count]);
    }

    public function transaction($id)
    {
        $data=file_get_contents('http://api.ethplorer.io/getTxInfo/'.$id.'?apiKey=freekey');
        $transaction=json_decode($data);

        $time = \Carbon\Carbon::createFromTimestamp($transaction->timestamp);
        $timestamp=$time->diffForHumans();

        return view('ETH.transaction',['transaction'=>$transaction,'id'=>$id,'timestamp'=>$timestamp]);
    }

    public function search(Request $request)
    {
        $search_term=Input::get('search_string');

        $data= file_get_contents('http://api.etherscan.io/api?module=account&action=txlist&address='.$search_term);
        $transaction=json_decode($data);

        if($transaction->status == 1) {
            return redirect()->to('/eth/address/' . $search_term);
        }
        else
        {
            $data=file_get_contents('http://api.ethplorer.io/getTxInfo/'.$search_term.'?apiKey=freekey');
            $transaction=json_decode($data);
            if( isset($transaction->success) ) {
                return redirect()->to('/eth/tx/'.$search_term);
            }
            else{

                try {

                    file_get_contents('https://api.blockcypher.com/v1/eth/main/blocks/' . $search_term);
                    return redirect()->to('/eth/block/' . $search_term);
                }

                catch (\Exception $e) {
                    $request->session()->flash('error_msg', 'Not a valid ETH address, transaction or block');
                    return redirect()->back();
                }

            }


        }


    }
}

