<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //Definimos los campos que se pueden asignar en masa
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id'];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
