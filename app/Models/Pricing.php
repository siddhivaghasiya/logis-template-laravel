<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pricing extends Model
{
    use HasFactory;
protected $table = 'pricing';

const STATUS_ACTIVE = '1';
const STATUS_INACTIVE = '0';
}
