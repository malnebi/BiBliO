<?php
namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Book;
use App\Models\Loan;

use Validator;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['bookList']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {           
        $books = Book::all();
        $clients = Client::all();       
        
        /* Treba da dobavi ime klijenta kod koga je knjiga        */

    // $clients = Client::where('id', 'books.client_id')->get('first_name');    // ovo ispisuje samo dvije yagrade[]
   // $clients = Client::where('clients.id', 'books.client_id')->get();    // ovo ispisuje samo dvije yagrade[]
   //  $client = Client::where('clients.id', (Book::find('client_id')))->get('clients.first_name');    
    //   $client = Client::with([ 'books.client_id' , 'client.id'])->get(); // -------------Call to undefined relationship [client_id] on model [App\Models\Book].
      // $client[3]->first_name;  // ----------- Attempt to read property "first_name" on null
    // $client->first_name;  //------------ Property [first_name] does not exist on this collection instance.
    // $client = Client::find($books->client_id);  //-----  EXCEPTION Property [client_id] does not exist on this collection instance.
 //   $client = Client::find(1, ['first_name'])->where('id', (Book::find('client_id')))->get();  //------EXCEPTION Call to a member function where() on null

       /** broji svako zaduzenje knjige */
 
       
       
// $numberOfLoans = Loan::where('loans.book_id','=', $idbook )->count(); // ovo ne radi nista
       // $numberOfLoans = '5';
        

        
        $data = [
            'books' => $books,
            'clients'=> $clients,
           // 'numberOfLoans'=> $numberOfLoans,
                ];

        return view('books.index', $data);
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {     
        return view('books.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$user = Auth::user();               //******Autorizacija korisnika
        if ($user != 'Admin') {
            return view ( view 'not-allowed');
        }*/

        $validatedData = $request->validate([         /**Validacija podataka */
            'year' => ['required', 'string', 'max:4'],
            'title' => ['required', 'string', 'max:200'],
            'loan' => ['integer', 'min:0', 'max:1'],
        ]);

        $book = new Book;
        $book->author_fname = $request->author_fname;
        $book->author_lname = $request->author_lname;
        $book->title = $request->title;
        $book->publisher_name = $request->publisher_name;
        $book->publisher_place = $request->publisher_place;
        $book->year = $request->year;
        $book->loan = 0;
        
        $book->save();

        return redirect('books');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);

        $data = [
            'book' => $book,
        ];
        
        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        
        $validatedData = $request->validate([         /**Validacija podataka */
            'year' => ['required', 'string', 'max:4'],
            'title' => ['required', 'string', 'max:200'],
            'loan' => ['integer', 'min:0', 'max:1'],
        ]);

        $book = Book::find($id);
        $book->author_fname = $request->author_fname;
        $book->author_lname = $request->author_lname;
        $book->title = $request->title;
        $book->publisher_name = $request->publisher_name;
        $book->publisher_place = $request->publisher_place;
        $book->year = $request->year;
        $book->loan = 0;
        $book->client_id = $request->client_id;
        
        $book->save();

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function bookList()
    {
        $books = Book::all();
        $data = [
            'books' => $books,
        ];

        return view('books.list', $data);       
    }



    public function book($id)
    {
        $book = Book::find($id);       
        
         
        $numberOfLoans = Loan::where('loans.book_id','=', $id )->count(); 
        $clientName=Loan::where([['book_id','=', $id]])->get(); // ime klienta koji je poyajmio knjigu

        $data = [

            'book' => $book,
            'numberOfLoans' => $numberOfLoans,
            'clientName' => $clientName,  
        ];
        //return $id;
        return view('books.book', $data);
    
    }


}
