<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class itemController extends Controller
{
    // Add data in supplier table
    public function addItem(Request $req)
    {
        $item = DB::table('item_infos')
                    ->insert(
                        [
                            'item_name' => $req ->item_name,
                            'company_name' => $req -> company_name,
                            'unit_price' => $req -> unit_price,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
        if($item){
            return redirect()->route('view.item')->with('status', 'Data Added Successfully');
            // return $item;

        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Show data in item table
     public function itemInfo()
    {
        $items = DB::table('item_infos')->get();

        return view('iteminfo' , ['data' => $items]);
    }

    //Show single item data in DB
    public function updateItemInfo(string $id)
    {
        $item = DB::table('item_infos')
                    ->where('item_id', $id)
                    ->get();
        return view('updateitem', ['data' => $item]);
    }

     // Update item in DB
    public function updateItem(Request $req, $id)
    {
        $supplier = DB::table('item_infos')
                    ->where('item_id' , $id)
                    ->update([
                        'item_name' => $req ->item_name,
                        'company_name' => $req -> company_name,
                        'unit_price' => $req -> unit_price,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
        if($supplier){
            return redirect()->route('view.item')->with('status', 'Data Updated Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Delete supplier from DB
    public function deleteItem(string $id)
    {
        $supplier=DB::table('item_infos')
                    ->where('item_id', $id)
                    ->delete();

        if($supplier){
            return redirect()->route('view.item')->with('status', 'Data Delate Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }

    }

}
