<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Loan;
use App\Models\Book;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        $data = [
            'clients' => $clients,
        ];

        return view('clients.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->school_role = $request->school_role;       
        $client->class = $request->class;
        $client->head_class_teacher = $request->head_class_teacher;
        $client->school_subject = $request->school_subject;
        $client->email = $request->email;
        $client->phone = $request->phone;        
        $client->save();

        return redirect('clients');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);

        $data = [
            'client' => $client,
        ];

        return view('clients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->school_role = $request->school_role;       
        $client->class = $request->class;
        $client->head_class_teacher = $request->head_class_teacher;
        $client->school_subject = $request->school_subject;
        $client->email = $request->email;
        $client->phone = $request->phone;        
        $client->save();

        return redirect('clients');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('clients');

    }

  /**
     * Display client data.
     */
    public function client($id)
    {
        $client = Client::find($id);       
        $numberOfAllLoans = Loan::where('client_id','=', $id) ->count();               
        $numberOfLoans = Loan::where([['client_id','=', $id], ['active', '=', '1']]) ->count(); 
        $bookName = Loan::where([['client_id','=', $id], ['active', '=', '1']])->get();
         
        $data = [
            'client' => $client,
            'numberOfAllLoans' => $numberOfAllLoans,  
            'numberOfLoans' => $numberOfLoans,  
            'bookName'=> $bookName,
        ];
        //return $id;
        return view('clients.client', $data);
    
    }

 
    

}
