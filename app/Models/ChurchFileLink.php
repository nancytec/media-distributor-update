<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchFileLink extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function media(){
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function download(){
        return $this->hasOne(ChurchMediaLinkDownload::class, 'media_link', 'link');
    }

    public function views(){
        return $this->hasMany(ChurchMediaLinkView::class, 'media_link', 'link');
    }

    public function likes(){
        return $this->hasMany(ChurchMediaLinkLike::class, 'media_link', 'link');
    }

    public function share(){
        return $this->hasOne(ChurchMediaLinkShare::class, 'media_link', 'link');
    }

}
