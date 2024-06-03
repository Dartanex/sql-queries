<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone'
    ];

    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedidos::class, 'id_usuario');
    }
}
