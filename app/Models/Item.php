<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'total',
        'repair'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }

    public function getAvailableAttribute()
    {
    $borrowed = $this->lendings()
        ->whereNull('returned_at')
        ->sum('quantity');

    return $this->total - $borrowed - $this->repair;
    }

    public function getLendingTotalAttribute()
    {
        return $this->lendings()
            ->whereNull('returned_at')
            ->sum('quantity');
    }
}