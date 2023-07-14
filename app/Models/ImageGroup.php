<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGroup extends Model
{
    /**
     * The name of the table
     * 
     * @var string
     */
    public $table = 'image_group';

    use HasFactory;
}
