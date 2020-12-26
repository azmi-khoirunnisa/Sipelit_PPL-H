<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\datapanen;

class pembayaran extends Model
{
    protected $fillable = [
      'jumlah_panen','bukti_pembayaran','user_id','datapanen_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function datapanen()
    {
      return $this->belongsTo('App\datapanen');
    }
}
