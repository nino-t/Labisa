<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $table = 'event';
  protected $fillable = [
    'user_id', 'category_id', 'purpose_category_id', 'name', 'slug', 'description', 'message', 'contact', 'target_amount', 'expired_date', 'thumbnail_url'
  ];

  public function userId()
  {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function categoryId()
  {
    return $this->belongsTo('App\Category', 'category_id');
  }

  public function purposeCategoryId()
  {
    return $this->belongsTo('App\PurposeCategory', 'purpose_category_id');
  }
}
