<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function chapters() {
        return $this->hasMany(Chapter::class);
    }

    public function getColor() {
        $colors = ['#f7b653', '#448922', '#dc6d37', '#3886d7', '#6c398c', '#0d5897', '#55c9ee'];
        return $colors[$this->id - 1];
    }
}
