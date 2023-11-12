<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $fillable = ['id','model','tahun','jumlahpenumpang','manufaktur','harga','tipebahanbakar','luasbagasi'];
    protected $table = 'mobils';
    public $timestamps = false;
}
