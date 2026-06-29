<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'prix', 'category', 'image', 'desc', 'solde', 'top', 'status'];

    protected $casts = [
        'prix' => 'decimal:2',
        'solde' => 'boolean',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value && !str_starts_with($value, 'http') && !str_starts_with($value, 'https')
                ? asset('storage/' . $value)
                : $value,
        );
    }
}
