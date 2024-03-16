<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use model class that have relation with this model
use App\Models\User;
use App\Models\ManagementAccess\Role;

class RoleUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'role_user';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    //declare fillable
    protected $fillable = [
        'role_id',
        'user_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // one to many
    public function user()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // one to many
    public function role()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }
}
