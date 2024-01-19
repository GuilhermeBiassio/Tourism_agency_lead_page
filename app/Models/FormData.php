<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;
    protected $table = 'form_data';
    protected $fillable = ['client_name', 'email', 'phone', 'message', 'ip'];
    protected $casts = [
        'client_name' => 'encrypted',
        'phone' => 'encrypted',
        'message' => 'encrypted',
        'ip' => 'encrypted'
    ];
}
