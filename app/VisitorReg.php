<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitorReg extends Model
{
    protected $table = 'visitor_regs';
    
    protected $fillable = [
        'fullname', 'time_in','whom_to_see','reason','mobile','time_out','remarks'
    ];

    
}
