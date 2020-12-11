<?php

namespace App;
use App\User;
use App\datapanen;

use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
  protected $fillable = [
      'harga', 'deskripsi', 'user_id', 'datapanen_id',
  ];

  public function datapanen()
  {
    return $this->belongsTo('App\datapanen');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
