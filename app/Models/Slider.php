<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slider;

class Slider extends Model
{
    use HasFactory;
    protected $fillable=['title','des','image'];

}
