<?php
namespace App;

use Keyhunter\Administrator\Repository;

class ScheduleProgram extends Repository
{
    /**
     * @var string
     */
    protected $table = 'schedule_program';

    /**
     * @var array
     */
    protected $fillable = ['schedule_id', 'program_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function schedule()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function program()
    {
        return $this->hasOne(Program::class, 'id', 'program_id');
    }
}