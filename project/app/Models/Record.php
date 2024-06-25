<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Record extends Model
{
    use Searchable;
    protected  $table = 'records';
    protected $fillable = [
        'schedule_id',
        'patient_id',
        'date',
        'time',
        'status',
    ];
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['schedule_id'] = $this->schedule->user->specializations ? $this->schedule->user->specializations->name : null;
        $array['patient_last_name'] = $this->patient ? $this->patient->last_name : null;
        $array['patient_first_name'] = $this->patient ? $this->patient->first_name : null;
        $array['patient_father_name'] = $this->patient ? $this->patient->father_name : null;
        $array['patient_date_of_birth'] = $this->patient ? $this->patient->date_of_birth : null;
        $array['patient_phone'] = $this->patient ? $this->patient->phone : null;
        $array['patient_email'] = $this->patient ? $this->patient->email : null;
        $array['date'] = $this->date;
        $array['time'] = $this->time;
        return $array;
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
