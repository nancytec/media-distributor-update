<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonMember extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImagePathAttribute(){
        return "https://ui-avatars.com/api/?name=$this->name&color=563C5C&background=FFFFFF";
    }
}
