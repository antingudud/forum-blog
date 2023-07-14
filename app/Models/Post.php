<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'idpost';

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
    public $table = 'post';

    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';

    /**
     * Create a new factory instance for the model.
     * 
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PostFactory::new();
    }

    use HasFactory;
}
