<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientController extends Controller
{
    // Show All client
    public function clientInfo()
    {
        $clients = DB::table('client_infos')->get();

        return view('clientinfo' , ['data' => $clients]);
    }

    // Show single client
    public function singleClient(string $id)
    {
        $client = DB::table('client_infos')->where('client_id' , $id)->get();
        return view('singleclient' , ['data' => $client]);
    }

    // Add client in DB
    public function addClient(Request $req)
    {
        $client = DB::table('client_infos')
                    ->insert(
                        [
                            'client_name' => $req ->client_name,
                            'address' => $req -> address,
                            'phone' => $req -> phone,
                            'contact_person' => $req -> contact_person,
                            'act_inact' => $req -> act_inact,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
        if($client){
            return redirect()->route('view.client')->with('status', 'Data Added Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Show updatable existing client info by id in DB
    public function updateClient(Request $req, $id)
    {
        $client = DB::table('client_infos')
                    ->where('client_id' , $id)
                    ->update([
                        'client_name' => $req ->client_name,
                        'address' => $req -> address,
                        'phone' => $req -> phone,
                        'contact_person' => $req -> contact_person,
                        'act_inact' => $req -> act_inact,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
        if($client){
            return redirect()->route('view.client')->with('status', 'Data Updated Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Delete client in DB
    public function deleteClient(string $id)
    {
        $client=DB::table('client_infos')
                    ->where('client_id', $id)
                    ->delete();

        if($client){
            return redirect()->route('view.client')->with('status', 'Data Delate Successfully');
        }else{
            echo "<h1>ERROR!!!!!!!!!</h1>";
        }
    }

    // Show existing client info by id in DB
    public function updateClientInfo(string $id)
    {
        $client = DB::table('client_infos')->where('client_id' , $id)->get();

        // Fetch data using find()
        // $client = DB::table('client_infos')->find($id);
        // return $client;
        // dd($client);
        // dump($client);
        return view('updateclient' , ['data' => $client]);
    }
}
