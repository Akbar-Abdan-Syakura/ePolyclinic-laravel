<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use model class that have relation with this model
use App\Models\Operational\Appointment;


class Transaction extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'transaction';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    //declare fillable
    protected $fillable = [
        'appointment_id',
        'fee_doctor',
        'fee_polyclinic',
        'fee_clinic',
        'sub_total',
        'ppn',
        'total',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // one to one
    public function appointment()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('App\Models\Operational\Appointment', 'appointment_id', 'id');
    }
}
