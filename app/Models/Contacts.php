<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number'
    ];

    protected $dates = ['deleted_at'];
}