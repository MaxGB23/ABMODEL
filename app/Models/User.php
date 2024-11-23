<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function categoriasCreadas()
    {
        return $this->hasMany(Categoria::class, 'created_by');
    }

    public function categoriasActualizadas()
    {
        return $this->hasMany(Categoria::class, 'updated_by');
    }

    /**
     * Relaciones Uno a Muchos con el modelo Servicio
     */
    public function serviciosCreados()
    {
        return $this->hasMany(Servicio::class, 'created_by');
    }

    public function serviciosActualizados()
    {
        return $this->hasMany(Servicio::class, 'updated_by');
    }

    /**
     * Relaciones Uno a Muchos con el modelo Contacto
     */

    public function contactosActualizados()
    {
        return $this->hasMany(Contacto::class, 'updated_by');
    }

    /**
     * Relaciones Uno a Muchos con el modelo Faq
     */
    public function faqsCreadas()
    {
        return $this->hasMany(Faq::class, 'created_by');
    }

    public function faqsActualizadas()
    {
        return $this->hasMany(Faq::class, 'updated_by');
    }

}
