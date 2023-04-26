<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactosEmergencia extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'personal_id',
        'nombre',
        'telefono'
    ];

    /**
     * Obtiene los datos del personal.
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id', 'id');
    }
}
