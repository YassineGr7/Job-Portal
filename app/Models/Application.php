<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function job()
  {
    return $this->belongsTo(Job::class);
  }

  public function resume()
  {
    return $this->belongsTo(Resume::class, 'resume_id');
  }
}
