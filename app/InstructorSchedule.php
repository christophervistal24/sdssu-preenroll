<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstructorSchedule extends Model
{
   public $timestamp = false;
   protected $fillable = ['start_time','end_time','days','room','subject','instructor','block'];
   public function checkSchedule($data = [])
   {
   		 $schedule = DB::select(
          DB::raw("
              SELECT * FROM instructor_schedules
            	WHERE start_time = '$data[start_time]'
              AND end_time = '$data[end_time]'
              AND days = '$data[days]'
              AND room = '$data[room]'
              AND subject = '$data[subject]'
              AND block = '$data[block]'
          ")
        );
       return ($schedule) ?? true;
   }

   public function preenrolrequest()
   {
      $this->primaryKey = 'id';
      return $this->belongsTo('App\PreEnroll','id','schedule_id');
   }

   public function getSubjectById($id)
   {
      return $this->where('id',$id)->first()->subject;
   }
}
