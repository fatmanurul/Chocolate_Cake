<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'cmn_id';

    const CREATED_AT = 'cmn_created_at';
    const UPDATED_AT = 'cmn_updated_at';
    const DELETED_AT = 'cmn_deleted_at';

    protected $guarded = ['cmn_id'];

}
