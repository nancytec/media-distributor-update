<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaLinkShare extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function media(){
        return $this->belongsTo(ChurchMemberFileLink::class, 'media_link', 'link');
    }
}
