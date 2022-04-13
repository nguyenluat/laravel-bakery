<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [ 'name', 'Phone', 'address', 'content',  'description', 'status', 'customer_id'];
}
