<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
   
    // カラムを指定
    protected $fillable = [
        'id',
        'title',
        'content',
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
