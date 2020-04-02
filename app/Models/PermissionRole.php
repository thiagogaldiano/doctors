<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PermissionRole extends Model
{
    public $table = 'permission_role';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $casts = [
        'id' => 'integer',
        'permission_id' => 'integer',
        'role_id' => 'integer'
    ];


}
