<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;

class Patient extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Searchable;

    protected $table = 'patients';
    protected $guard = 'patient';

    public $timestamps = false;
    protected $fillable = [
        'email',
        'password',
        'snils' ,
        'date_of_birth',
        'last_name',
        'first_name',
        'father_name',
        'phone' ,
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
      'password' => 'hashed',
    ];
    public function toSearchableArray()
    {

        $array = $this->toArray();

        // Добавляем поле name из связанной таблицы cabinets
        $array['email'] = $this->email;
        $array['date_of_birth'] = $this->date_of_birth;
        $array['snils'] = $this->snils;
        $array['last_name'] = $this->last_name;
        $array['first_name'] = $this->first_name;
        $array['father_name'] = $this->father_name;
        $array['phone'] = $this->phone;
        return $array;

    }
    public function records(){
        return $this->hasMany(Record::class);
    }
}
