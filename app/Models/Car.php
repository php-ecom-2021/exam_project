<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'founded', 'description', 'image_path', 'user_id']; // it allows for mass assignment of these columns

    public function carmodels() {
        return $this->hasMany(CarModel::class);
    }

    //Defining a has many through relationship
    public function engines() {
        return $this->hasManyThrough(
            Engine::class, 
            CarModel::class, 
            'car_id', //Foreign key on CarModel table
            'model_id' //Foreign key on Engine table
        );
    }

    //Defining many to many relationship
    public function products() {
        return $this->belongsToMany(Product::class);
    }

}
