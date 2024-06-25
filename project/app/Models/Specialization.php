<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;


class Specialization extends Model
{
    use Searchable;
    protected $fillable = [
        'name',
        'description',
    ];
    public function toSearchableArray()
    {
        return [
          'name' => $this->name,
          'description' => $this->description,
        ];
    }

    public function users():BelongsToMany{
      return $this->belongsToMany(User::class, 'specializations_users', 'specialization_id', 'user_id');
    }
    public function services(){
        return $this->hasMany(Service::class);
    }

}
