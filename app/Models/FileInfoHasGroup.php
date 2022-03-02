<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileInfoHasGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_info_id',
        'group_name',
        'total'
    ];
}
