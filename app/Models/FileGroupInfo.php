<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileGroupInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_info_has_group_id',
        'number',
        'first_name',
        'last_name',
        'email',
        'state',
        'zip',
    ];
}
