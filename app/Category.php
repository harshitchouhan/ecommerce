<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['C_pid', 'C_name', 'C_detail', 'C_image', 'C_status', 'C_metatitle', 'C_metakeyword', 'C_metadescription'];
}
