<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'foto',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'email' => 'required|unique:users',
        'name' => 'required',
        'password' => 'required',


    ];

    public static $rulesMessage = [
        'email.required' => 'El email es obligatorio',
        'email.unique' => 'El email ya está registrado',
        'name.required' => 'El nombre es obligatorio',
        'password.required' => 'La contraseña es obligatorio',


    ];

    public static $rulesProfile = [
        'email' => 'required',
        'name' => 'required',
        'foto' => 'mimes:jpg,png,jpeg'
    ];

    public static $rulesMessageProfile = [
        'email.required' => 'El email es obligatorio',
        'name.required' => 'El nombre es obligatorio',
        'foto.mimes' => 'Tipo de archivo no aceptado.',


    ];
}
