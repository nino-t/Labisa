<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurposeCategory extends Model
{
  protected $table = 'purpose_category';
  protected $fillable = [
    'name', 'description'
  ];
}
