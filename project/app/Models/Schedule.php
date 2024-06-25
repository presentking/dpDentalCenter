<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Schedule extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'date',
        'start_work',
        'end_work',
        'time_of_receipt',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function records(){
        return $this->hasMany(Record::class);
    }
}
