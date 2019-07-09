<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['is_complete'];

    public function complete()
    {
        return $this->update(['is_complete' => true]);
    }

    public function isComplete()
    {
        return $this->is_complete == 1;
    }
}
