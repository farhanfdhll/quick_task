<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'due_date',
        'is_important',
        'status',
    ];

    public function tasks_cart(){
        return $this->belongsTo(TaskCart::class);
    }
}
