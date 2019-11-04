<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','zip_code','date_of_birth','uf', 'city', 'years'];
    
}
