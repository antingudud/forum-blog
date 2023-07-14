<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'idcomment';
    
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
    public $table = 'comment';

    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';

    use HasFactory;
}
