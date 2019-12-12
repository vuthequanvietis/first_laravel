<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Contact extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = ['name','email','address','content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeYour($query)
    {
        return $query->where('user_id', Auth::id());
    }
}
