<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Searchable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'last_name',
        'first_name',
        'father_name',
        'number_phone',
        'role',
        'work_experience',
        'education',
        'date_of_birth',
        'residence_address',
        'path_img',
    ];
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['last_name'] = $this->last_name;
        $array['first_name'] = $this->first_name;
        $array['father_name'] = $this->father_name;
        $array['work_experience'] = $this->work_experience;
        $array['education'] = $this->education;
        return $array;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
    public function specializations():BelongsToMany{
        return $this->belongsToMany(Specialization::class, 'specializations_users', 'user_id', 'specialization_id');
      }

    public function schedules(): HasMany{
        return $this->hasMany(Schedule::class);
    }

}
