<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    use HasFactory;
    //const UPDATED_AT = null;
    //const CREATED_AT = null;
    protected $fillable=['id','firstname','lastname','mail','phone'];
}
