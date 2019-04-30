<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogDonation extends Model
{
  protected $table = 'log_donation';
  protected $fillable = [
    'user_id', 'event_id', 'donatur_name', 'donatur_contact', 'donatur_message', 'amount'
  ];
}
