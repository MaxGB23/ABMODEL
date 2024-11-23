<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{

    protected $fillable = ['nombre','correo','telefono','asunto', 'mensaje', 'status','updated_by'];

    protected $with = ['actualizador'];

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->updated_by = auth()->id();
        });
        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}


