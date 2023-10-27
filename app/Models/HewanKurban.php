<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HewanKurban extends Model
{
    use HasFactory ,SoftDeletes;

    protected $guarded = ['id'];

    public function user_kelompok(){
        return $this->hasMany(UserPaketKurban::class,'hewan_kurbans_id' ,'id');
    }
}
