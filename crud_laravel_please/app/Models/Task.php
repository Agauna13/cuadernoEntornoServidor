<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //$fillable define que campos se pueden asignar en masa (mass assignment)
    //Esto permite usar Task::create([]) sin problemas de seguridad
    protected $fillable = ['title','description'];
}
