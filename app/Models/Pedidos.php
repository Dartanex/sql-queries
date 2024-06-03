<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity',
        'total_price',
        'id_usuario'
    ];

    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
