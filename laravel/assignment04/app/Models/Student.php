<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'age', 'major_id'
    ];

    /**
     * Major Fuction for table relationship
     */
    public function major()
    {
        return $this->belongsTo('App\Models\Major', 'major_id');
    }
}
