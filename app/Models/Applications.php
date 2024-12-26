<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $table = 'applications';

    protected $fillable = [
        'name',
        'description',
        'requirements',
        'guides',
        'source_code_link',
        'file_path',
        'thumbnail',
        'latest_version',
        'status',
    ];
}
