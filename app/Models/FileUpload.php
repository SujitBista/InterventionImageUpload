<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FileUpload extends Authenticatable
{
   
    protected $table = 'fileupload';

    protected $fillable = [
        'imageName'
    ];

}
