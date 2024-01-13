<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supplierController extends Controller
{
    // Add data in supplier table
    public function addSupplier(Request $req)
    {
        $supplier = DB::table('supplier-infos')
                    ->insert(
                        [
                            'supplier_name' => $req ->supplier_name,
                            'email' => $req -> email,
                            'address' => $req -> address,
                            'phone' => $req -> phone,
                            'contact_person' => $req -> contact_person,
                            'act_inact' => $req -> act_inact,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
        if($supplier){
            return redirect()->route('view.supplier')->with('status', 'Data Added Successfully');
            return $supplier;
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Show data in supplier table
     public function supplierInfo()
    {
        $suppliers = DB::table('supplier-infos')->get();

        return view('supplierinfo' , ['data' => $suppliers]);
    }

    // Single supplier show
    public function singleSupplier(string $id)
    {
        $supplier = DB::table('supplier-infos')->where('supplier_id', $id)->get();
        return view('singlesupplier' , ['data' => $supplier]);
    }

    // Show updatable supplier from data
    public function updateSupplierInfo(string $id)
    {
         $supplier = DB::table('supplier-infos')->where('supplier_id' , $id)->get();

        return view('updatesupplier' , ['data' => $supplier]);
    }

    // Update supplier in DB
    public function updateSupplier(Request $req, $id)
    {
        $supplier = DB::table('supplier-infos')
                    ->where('supplier_id' , $id)
                    ->update([
                        'supplier_name' => $req ->supplier_name,
                        'email' => $req -> email,
                        'address' => $req -> address,
                        'phone' => $req -> phone,
                        'contact_person' => $req -> contact_person,
                        'act_inact' => $req -> act_inact,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
        if($supplier){
            return redirect()->route('view.supplier')->with('status', 'Data Updated Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Delete supplier from DB
    public function deleteSuplier(string $id)
    {
        $supplier=DB::table('supplier-infos')
                    ->where('supplier_id', $id)
                    ->delete();

        if($supplier){
            return redirect()->route('view.supplier')->with('status', 'Data Delate Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }

    }
}
