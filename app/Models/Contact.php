<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','address','content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
