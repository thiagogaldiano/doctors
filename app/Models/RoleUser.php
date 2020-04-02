<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RoleUser extends Model
{
    public $table = 'role_user';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'user_id' => 'integer'
    ];


}
