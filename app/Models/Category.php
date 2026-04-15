<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'division_pj_id',
        'total_items'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_pj_id');
    }
}