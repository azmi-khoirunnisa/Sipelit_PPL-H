<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\datapanen;
use App\tanggapan;

class data_tanggapan extends Model
{
    protected $fillable = [
      'harga','deskripsi','user_id','datapanen_id','tanggapan_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function datapanen()
    {
      return $this->belongsTo('App\datapanen');
    }
    public function tanggapan()
    {
      return $this->belongsTo('App\tanggapan');
    }
}
