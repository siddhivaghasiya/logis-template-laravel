<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
protected $table = 'cms';

const STATUS_ACTIVE = '1';
const STATUS_INACTIVE = '0';
}