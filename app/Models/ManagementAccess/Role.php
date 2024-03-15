<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use model class that have relation with this model
use App\Models\User;
use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\PermissionRole;
use App\Models\ManagementAccess\RoleUser;


class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'role';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    //declare fillable
    protected $fillable = [
        'title',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        // 1 parameter (only path model)
        return $this->belongsToMany(User::class);
    }

    public function permission()
    {
        // 1 parameter (only path model)
        return $this->belongsToMany(Permission::class);
    }

    // one to many
    public function role_user()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany(RoleUser::class, 'role_id');
    }

    // one to many
    public function permission_role()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany(PermissionRole::class, 'role_id');
    }
}
