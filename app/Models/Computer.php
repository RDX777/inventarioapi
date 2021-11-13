<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $table = 'computers';

    protected $fillable = [
        'processor',
        'memory_size',
        'video',
        'video_size',
        'hard_disk_size',
        'ssd_size',
        'network_cable_mac',
        'network_wireless_mac',
        'manufacturer_name',
        'is_notebook',
        'comments',
        'model',
        'serial_number',
        'hostname'
    ];

    public $timestamps = false;

    public function locals()
    {
        return $this->belongsToMany(Local::class)->withPivot(['start_date', 'end_date']);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class)->withPivot(['start_date', 'end_date']);
    }

    public function softwares()
    {
        return $this->belongsToMany(Software::class)->withPivot(['start_date', 'end_date']);
    }
}
