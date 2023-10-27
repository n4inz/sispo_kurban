<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPaketKurban extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    const not_paid = 0;
    const waiting = 1;
    const paid = 2;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id' , 'id');
    }
}
