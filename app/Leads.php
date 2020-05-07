<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'programa',
        'observacion',
        'estado'
    ];


    //scopes para filtros

    public function scopeEmail( $query, $email ) {
        if( $email ) {
            return $query->where( 'email', $email );
        }
    }

    public function scopeEstado( $query, $estado ) {
        if( $estado ) {
            return $query->where( 'estado', $estado );
        }
    }

    public function scopeTelefono( $query, $telefono ) {
        if( $telefono ) {
            return $query->where( 'telefono', $telefono );
        }
    }

}
