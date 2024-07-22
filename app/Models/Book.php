<?php

namespace App\Models;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }


}
