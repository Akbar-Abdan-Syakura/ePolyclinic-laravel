<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // declare table
    public $table = 'appointment';

    // this field must type date yyyy-mm-dd hh:mm:ss
    protected $date = [
        'deleted_at',
        'created_at',
        'updated_at',
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
        return $this->belongsTo('App\Models\Operational\Doctor.php', 'doctor_id', 'id');
    }

    // one to one
    public function transaction()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasOne('App\Models\Operational\Transaction.php', 'appointment_id');
    }

    // one to many
    public function consultation()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('App\Models\MasterData\Consultation.php', 'consultation_id', 'id');
    }

    // one to many
    public function user()
    {
        // 3 parameter (path model, field foreign key, field primary key from table/model hasMany/hasOne)
        return $this->belongsTo('app\Models\User.php', 'user_id', 'id');
    }
}
