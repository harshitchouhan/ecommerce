<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['p_code', 'p_brandid', 'p_categoryid', 'p_name', 'p_description', 'p_wholesaleprice', 'p_retailprice', 'p_saleprice', 'p_status', 'p_image1', 'p_image2', 'p_image3', 'p_image4', 'p_image5', 'p_video', 'p_metatitle', 'p_metakeyword', 'p_metadescription', 'p_relatedProducts'];
}
