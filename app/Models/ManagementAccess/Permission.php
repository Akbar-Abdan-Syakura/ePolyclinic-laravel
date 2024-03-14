<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'permission';

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

    // one to many
    public function permission_role()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('app\Models\ManagementAccess\PermissionRole.php', 'permission_id');
    }

    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }
}
