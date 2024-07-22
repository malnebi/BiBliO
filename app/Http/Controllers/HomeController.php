<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\User;
use App\Models\Loan;
use App\Models\Book;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($days)
    {
          //$currentDate = Carbon::now();
          $start = Carbon::now()->subDays($days);
          //$start = Carbon::now()->subYears(1);
          //$start = Carbon::now()->subMonths(1);
          
          $user = Auth::user();
        
          if($user->role == 'Admin') {
              
              $numberOfClients = Client::where('created_at','>', $start)->count();
              $numberOfLoans = Loan::where('created_at','>', $start)->count();
              $numberOfBooks = Book::where('created_at','>', $start)->count();
              $numberOfLibrarians = User::where([['role', 'Librarian'],['created_at','>', $start]])->count();
          }

          if($user->role == 'Librarian') {
            
              $numberOfClients = null; 
              $numberOfLibrarians = null;
              $numberOfBooks = Book::where('created_at','>', $start)->count();      
              //$numberOfBooks =  Loan::where([['user_id','=', $user->id],['book_id','=', $user->id],['created_at','>', $start]])->count();
              $numberOfLoans = Loan::where([['user_id','=', $user->id],['created_at','>', $start]])->count();
        }

          $data = [
              'user' => $user,
              'numberOfLibrarians' => $numberOfLibrarians,
              'numberOfClients' => $numberOfClients,
              'numberOfLoans' => $numberOfLoans,
              'numberOfBooks' => $numberOfBooks,
          ];
  
          return view('home', $data);
  
    }
}
