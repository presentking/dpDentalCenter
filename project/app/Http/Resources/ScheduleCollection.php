<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ScheduleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id' => $this->id,
          'date' => $this->date,
          'start_work'=> $this->start_work,
          'end_work' => $this->end_work,
          'time_of_receipt'=> $this->time_of_receipt,
        ];
    }
}
