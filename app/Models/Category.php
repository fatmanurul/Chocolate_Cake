<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'ctg_id';
    
    const CREATED_AT = 'ctg_created_at';
    const UPDATED_AT = 'ctg_updated_at';
    const DELETED_AT = 'ctg_deleted_at';

    protected $guarded = ['ctg_id'];

   
}
