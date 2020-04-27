<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['B_title', 'B_detail', 'B_image', 'B_status'];
}
