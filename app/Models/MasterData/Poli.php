<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poli extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'poli';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many
    public function doctor()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('App\Models\Operational\Doctor.php', 'poli_id');
    }
}
