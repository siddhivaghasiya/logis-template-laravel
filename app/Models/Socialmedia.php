<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Socialmedia extends Model
{
    use HasFactory;
protected $table = 'Socialmedia';

const STATUS_ACTIVE = '1';
const STATUS_INACTIVE = '0';
}
