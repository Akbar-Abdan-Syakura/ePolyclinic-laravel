<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigPayment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'config_payment';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    //declare fillable
    protected $fillable = [
        'fee',
        'ppn',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
