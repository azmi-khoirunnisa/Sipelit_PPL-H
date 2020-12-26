<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\tanggapan;
use App\pembayaran;
use App\data_tanggapan;

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
  public function pembayaran()
  {
    return $this->hasMany('App\pembayaran');
  }
  public function balasan()
  {
    return $this->hasMany('App\data_tanggapan');
  }
}
