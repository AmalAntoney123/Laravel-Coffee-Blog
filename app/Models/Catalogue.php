<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $table = 'catalogue';
    protected $fillable = ['name', 'description', 'price', 'image_path'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
