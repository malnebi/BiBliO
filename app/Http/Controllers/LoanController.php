<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;

use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $user = Auth::user();
            $loans = array(); 
    
            if($user->role == 'Admin') {
                $loans = Loan::all();
                $loans = Loan::with(['user', 'book', 'client'])->get();
            }
            if($user->role == 'Librarian') {
                $loans = $user->loans;
            }
            $data = [
                'loans' => $loans,
            ];
            return view('loans.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($client_id)
    {
        {
            $client = Client::find($client_id);
            $book = Book::where('loan','0')->get();
            $user = User::all();            // u create.blade.php se prikazuje ulogovani korisnik i njegov id se upisuje u bazu
            
            $data = [
                'client' => $client,
                'books' => $book,
                'users' => $user,
            ];
            
            return view('loans.create', $data);
        }
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->date;        //$time = Carbon::parse($request->time);
        
        $loan = new Loan;
        $loan->client_id = $request->client_id;
        $loan->book_id = $request->book_id;
        $loan->user_id = $request->user_id;  
        $loan->return_deadline = Carbon::now()->addDays(30);   // rok za vraćanje knjige je 30 dana //$loan->return_deadline = $time->format("Y-m-d");
        $loan->description = $request->description;  
        $loan->active = 1;
        $loan->save();
        
        /** upis u tabelu book */

        $book = Book::find($loan->book_id);        // traži knjigu u tabeli book na osnovu broja klijent u loan
        $book->loan = 1;                              // zaduženje knjige je aktivno 
        $book->client_id = $loan->client_id;           // upis broja klijenta koji je zadužio knjigu 
        $book->save();

        $id_client = $loan->client_id; 

        return redirect()->action([ClientController::class, 'client'], [$id_client]);  

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.   FORMULAR VRACANJE KNJIGE!!!
     */
    public function edit(string $id)
    {
        $loan = Loan::find($id);        
        $book = Book::find($loan->book_id);
            
        $data = [
            'loan' => $loan,
            'book' => $book,
        ];        
        return view('loans.edit', $data);
    }
    // Update the specified resource in storage.    VRACANJE KNJIGE!!!
    public function update(string $id)  
        {   
        $loan = Loan::find($id);
        $loan->active = 0; 
        $loan->save();

        $book = Book::find($loan->book_id);        // traži knjigu u tabeli book na osnovu broja knjige u tabeli zaduzanja
        $book->loan = 0;                              // zaduženje je neaktivno  - knjiga je slobodna)
        $book->client_id = $loan->client_id;           // upis broja klijenta koji je zadužio knjigu           
        $book->save();
     
        $id_client = $loan->client_id; 

        return redirect()->action([ClientController::class, 'client'], [$id_client]);  

    }


   /**
     * Show the form for editing the specified resource.   FORMULAR PRODUZENJA ROKA ZA VRACANJE KNJIGE!!!
     */
    public function editReturn(string $id)  
    {
        $loan = Loan::find($id);
        $data = [
            'loan' => $loan,
        ];
        return view('loans', $data);
    }


    
    /**
        * Update the specified resource in storage.    PRODUZAVA ROK ZA VRACANJE KNJIGE!!!
        */
   
    public function updateReturn( $id)  // mijenja datum za 30 dana od danas
    {

    $loan = Loan::find($id); 
    $loan->return_deadline = Carbon::now()->addDays(60);   // rok za vraćanje knjige je 60 dana    
    $loan->save();

    $id_client = $loan->client_id; 

    return redirect()->action([ClientController::class, 'client'], [$id_client]);  

 }


/**    * Remove the specified resource from storage. */
public function destroy(string $id)
{                      }

}