<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileFolder extends Model
{
    public $timestamps = false;
    protected $table = 'files_folders';

    protected $fillable = ['folder_path', 'folder_json'];

}
