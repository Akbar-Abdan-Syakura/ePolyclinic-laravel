<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use model: for relation
use App\Models\MasterData\TypeUser;
use App\Models\User;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'detail_user';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    //declare fillable
    protected $fillable = [
        'user_id',
        'type_user_id',
        'nik',
        'bpjs',
        'contact',
        'address',
        'photo',
        'gender',
        'age',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // one to many
    public function type_user()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo(TypeUser::class, 'type_user_id', 'id');
    }

    // one to many
    public function user()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
