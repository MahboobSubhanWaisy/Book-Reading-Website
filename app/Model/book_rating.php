<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class book_rating extends Model
{
    protected $table = 'book_rating';
    protected $primaryKey = 'br_id';
    const CREATED_AT = "br_created_at";
    const UPDATED_AT = "br_updated_at";
}
