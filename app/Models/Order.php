<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Creating new relationships
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
