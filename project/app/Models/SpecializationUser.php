<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpecializationUser extends Model
{
    protected $table = 'specializations_users';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'specialization_id',
    ];



}
