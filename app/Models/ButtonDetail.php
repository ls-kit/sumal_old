<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status','shopify_scripttag_id'];
}
