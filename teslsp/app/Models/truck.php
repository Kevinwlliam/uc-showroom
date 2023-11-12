<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class truck extends Model
{
    protected $fillable = ['id','model','tahun','jumlahpenumpang','manufaktur','harga','jumlahrodaban','luasareakargo'];
    protected $table = 'trucks';
    public $timestamps = false;
}
