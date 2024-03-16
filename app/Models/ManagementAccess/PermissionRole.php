<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use model class that have relation with this model
use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\Role;

class PermissionRole extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'permission_role';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    //declare fillable
    protected $fillable = [
        'permission_id',
        'role_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // one to many
    public function role()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }

    // one to many
    public function permission()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
    }
}
