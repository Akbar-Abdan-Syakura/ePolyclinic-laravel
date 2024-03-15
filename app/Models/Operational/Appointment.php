<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use model class that have relation with this model
use App\Models\User;
use App\Models\Operational\Doctor;
use App\Models\MasterData\Consultation;
use App\Models\Operational\Transaction;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'appointment';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //declare fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // one to many
    public function doctor()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    // one to one
    public function transaction()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasOne(Transaction::class, 'appointment_id');
    }

    // one to many
    public function consultation()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo(Consultation::class, 'consultation_id', 'id');
    }

    // one to many
    public function user()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
