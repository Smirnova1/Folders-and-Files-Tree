<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileFolder extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'files_folders';

    /**
     * @var array
     */
    protected $fillable = ['folder_path', 'folder_json'];

}
