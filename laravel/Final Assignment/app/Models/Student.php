<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'major_id',
        'deleted_at'
    ];
    
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
