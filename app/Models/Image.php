<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'idimage';

    /**
     * Indicates if the model's ID is auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * The name of the table
     * 
     * @var string
     */
    public $table = 'image';

    CONST CREATED_AT = 'create_time';
    // CONST UPDATED_AT = 'update_time';

    use HasFactory;
}
