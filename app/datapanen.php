<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\tanggapan;

class datapanen extends Model
{
  protected $fillable = [
      'Judul', 'image', 'Harga', 'deskripsi', 'user_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function tanggapan()
  {
    return $this->hasMany('App\tanggapan');
  }
}
