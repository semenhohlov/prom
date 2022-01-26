<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(Category::class, 'group_parent_number', 'group_number');
    }
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'group_number', 'group_parent_number');
    }
}
