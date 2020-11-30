<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datapanen extends Model
{
  protected $fillable = [
      'Judul', 'image', 'Harga', 'deskripsi',
  ];
}
