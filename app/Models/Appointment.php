<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'appointment_no';


    /**
     * The primary key associated with the table.
     *
     * @var string
     */   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
        'area',
        'event_date', 
        'start_time', 
        'end_time'
    ];

    static public function facultygetRecord()
{
    $userId = auth()->id();

    $return = Appointment::select(
            'appointment.*',
            'users.name as created_by',
        )
        ->join('users', 'users.id', '=', 'appointment.created_by')
        ->where('homework.created_by', '=', $userId)
        ->orderBy('appointment.id', 'desc')
        ->get();

    return $return;
}

}