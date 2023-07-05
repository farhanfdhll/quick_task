<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCart extends Model
{
    use HasFactory;

    protected $table = 'tasks_cart';

    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
