<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provincia_id',
        'nombre',
    ];

    /**
     * Obtiene los datos del personal.
     */
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'personal_id', 'id');
    }
}
