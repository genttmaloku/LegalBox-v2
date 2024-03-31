<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;


    protected $fillable = [
        'case_id',
        'title',
        'client',
        'category',
        'progress',
        'description',
        
    ];
}
