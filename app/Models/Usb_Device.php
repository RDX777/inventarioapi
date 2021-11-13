<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usb_Device extends Model
{
    use HasFactory;

    protected $table = 'usb_devices';

    public function local()
    {
        return $this->belongsToMany(Local::class, 'usb_device_local')->withPivot(['start_date', 'end_date']);
    }
}
