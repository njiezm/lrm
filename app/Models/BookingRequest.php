<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    protected $fillable = [
        'excursion', 'date', 'adults', 'children', 'children_ages', 'name', 'email', 'phone', 'message', 'ip',
    ];

    protected function casts(): array
    {
        return ['date' => 'date', 'adults' => 'integer', 'children' => 'integer'];
    }

    public function excursionName(): string
    {
        return config("site.excursions.{$this->excursion}.name")
            ?? \App\Http\Requests\BookingRequestForm::OTHER[$this->excursion]
            ?? $this->excursion;
    }
}
