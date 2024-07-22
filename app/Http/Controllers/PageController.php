<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{
          /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
    public function privacy(){

        return view('pages.privacy');
    }

    public function aboutApp(){
        
        return view('pages.about-app');
    }
   
    public function bookList()
    {
        $books = Book::all();
        $data = [
            'books' => $books,
        ];

        return view('books.list', $data);
       
       
    }

   
}
