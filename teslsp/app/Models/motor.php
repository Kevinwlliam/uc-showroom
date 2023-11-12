<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motor extends Model
{
    protected $fillable = ['id','model','tahun','jumlahpenumpang','manufaktur','harga','ukuranbagasi','kapasitasbensin'];
    protected $table = 'motors';
    public $timestamps = false;
}
