<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Service extends Model
{
    use Searchable;

    protected $table = 'services';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'specialization_id',
    ];
    public function specialization(){
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id');
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['name'] = $this->name;
        $array['price'] = $this->price;
        $array['specialization_id'] = $this->specialization ? $this->specialization->name : null;
        return $array;
    }
}
