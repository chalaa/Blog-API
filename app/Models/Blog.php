<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = "blog_id";
    protected $guarded =[];

    protected $fillable=[
        'title',
        'description',
        'detail',
        'image_path'
    ];

}
