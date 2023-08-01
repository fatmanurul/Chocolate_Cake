<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const CREATED_AT = 'art_created_at';
    const UPDATED_AT = 'art_updated_at';
    const DELETED_AT = 'art_deleted_at';
    
    use HasFactory;

    protected $guarded = ['art_id'];
}
