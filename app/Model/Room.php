<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   use HasFactory;
   public $timestamps = false;
   protected $primaryKey = 'id';

   public function division()
   {
       return $this->belongsTo(Division::class, 'id_division', 'id_division');
   }
   public function rooms_view()
   {
       return $this->belongsTo(Rooms_view::class, 'id_view', 'id_view');
   }

    protected $fillable = [
        'number',
        'id_view',
        'square',
        'places',
        'id_division'
    ];
}
