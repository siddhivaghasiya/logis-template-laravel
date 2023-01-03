<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
protected $table = 'team';

const STATUS_ACTIVE = '1';
const STATUS_INACTIVE = '0';
}
