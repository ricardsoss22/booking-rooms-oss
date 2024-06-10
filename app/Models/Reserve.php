<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $table = 'reserve';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'room_id',
        'user_id',
        'status',
        'start_date',
        'end_date',
        'room_quantity'
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class);
    }
}
