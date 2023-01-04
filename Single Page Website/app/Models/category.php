<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table ='categories';
    protected $primarykey ='cid';
    protected $fillable=['title','slug','status'];
}
//$data=categories::join('cid','title','='"setups.meta_title');