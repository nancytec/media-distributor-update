<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchMemberFileLink extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function media(){
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function download(){
        return $this->hasOne(MediaLinkDownload::class, 'media_link', 'link');
    }

    public function views(){
        return $this->hasMany(MediaLinkView::class, 'media_link', 'link');
    }

    public function likes(){
        return $this->hasMany(MediaLinkLike::class, 'media_link', 'link');
    }

    public function share(){
        return $this->hasOne(MediaLinkShare::class, 'media_link', 'link');
    }
}
