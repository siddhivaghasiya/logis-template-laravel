<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Faq extends Model
{
    use HasFactory;
protected $table = 'faq';

const STATUS_ACTIVE = '1';
const STATUS_INACTIVE = '0';
}
