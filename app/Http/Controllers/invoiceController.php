<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class invoiceController extends Controller
{
    //
    // public function invoiceMain()
    // {
    //     $clientId = DB::table('client_infos')->get('client_id');

    //     // return $clientId;
    //     return view('addinvoice' , ['data' => $clientId ]);
    // }

    //
    public function itemListInvoice()
    {
        $itemId = DB::table('item_infos')->get();
        $clientId = DB::table('client_infos')->get();

        // return [$itemId, $clientId];
        return view('addinvoice' , [
            'data1' => $itemId,
            'data2' =>$clientId
        ]);

    }

    public function getClientInputId(Request $request)
    {
        $client_id = $request->post('clint_id');
        $clientAddress = DB::table('client_infos')->where('client_id',$client_id)->get('address');

        foreach($clientAddress as $id =>$address)
        {
            echo $address->address;
        }
    }

    public function getItemInputId(Request $request)
    {
        $item_id = $request->post('item_id');

        $itemInfos = DB::table('item_infos')->where('item_id',$item_id)->get();

        // echo $itemInfos;
        return $itemInfos;

    }

}
