<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    protected $fillable = ['name', 'weight', 'price', 'image', 'description', 'delivery_price', 'active'];
    protected $table = 'coffees';

    /**
     * Атрибуты, которые должны быть приведены к определенным типам.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'delivery_price' => 'decimal:2',
    ];
}
