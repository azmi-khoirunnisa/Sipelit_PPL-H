<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class datapanen extends Model
{
  protected $fillable = [
      'Judul', 'image', 'Harga', 'deskripsi', 'user_id',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
