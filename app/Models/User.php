<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'UID';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

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
    public $table = 'user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    protected $fillable = ['username', 'email', 'password', 'UID'];

    CONST CREATED_AT = 'create_time';
    CONST UPDATED_AT = 'update_time';

}
