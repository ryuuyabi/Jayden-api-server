<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected const SELECT_INDEX = [];
    protected const SELECT_SHOW = [];
}
