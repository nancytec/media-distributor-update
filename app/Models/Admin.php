<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImagePathAttribute(){
        if (!empty($this->profile_photo_path)){
            return Storage::disk('public')->url($this->profile_photo_path);
        }else{
            return "https://ui-avatars.com/api/?name=$this->name&color=563C5C&background=FFFFFF";
        }
    }

}
