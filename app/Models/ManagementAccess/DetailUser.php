<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
