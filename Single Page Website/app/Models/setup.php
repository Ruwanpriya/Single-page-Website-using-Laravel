<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setup extends Model
{
    protected $table = 'setups';
    protected $primarykey ='sid';
    protected $fillable=['logo','meta_title','address','contact','email','social'];

}
