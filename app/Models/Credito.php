<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $fillable = [
        'cliente_id',
        'tipo_producto',
        'valor_credito',
        'plazo',
        'interes',
        'total_pagar',
        'valor_cuota'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}