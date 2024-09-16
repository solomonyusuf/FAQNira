<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasUuids;

  protected $table = 'departments';
  protected $primaryKey = 'id';
  public $fillable = [
      'id',
      'title',
  ];
}
