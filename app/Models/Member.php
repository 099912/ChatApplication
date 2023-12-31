<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;
class Member extends Model
{
    use HasFactory;
    protected $fillable=[
        'group_id',
        'user_id',

        ];


    public function getGroup(){
        return $this->hasOne(Group::class,'id','group_id');
    }
}
