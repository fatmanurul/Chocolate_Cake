<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'art_id';

    const CREATED_AT = 'art_created_at';
    const UPDATED_AT = 'art_updated_at';
    const DELETED_AT = 'art_deleted_at';
    
    protected $fillable = [
        'art_category_id',
        'art_title',
        'art_slug',
        'art_image',
        'art_excerpt',
        'art_content'
    ];


}
