<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }



    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }

  
    
}
