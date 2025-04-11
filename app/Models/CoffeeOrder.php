<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoffeeOrder extends Model
{
    use HasFactory;

    /**
     * Поля, разрешенные для массового заполнения.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prodname',
        'prodimage',
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'zip',
        'country',
        'sub2',
        'reff',
        'temp',
        'hit',
        'completed'
    ];

    protected $casts = [
        'completed' => 'boolean'
    ];

    /**
     * Получить пользователя, оформившего заказ.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
} 