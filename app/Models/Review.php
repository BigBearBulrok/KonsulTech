<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Define the fillable attributes so they can be mass-assigned
    protected $fillable = ['name', 'image', 'text', 'rating'];
}
