<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
   use HasFactory;
   public $timestamps = false;

   public function divisions_view()
   {
       return $this->belongsTo(Divisions_view::class, 'id_view', 'id_view');
   }
}
