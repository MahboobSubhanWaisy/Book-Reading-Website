<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class book_attachment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'at_book_id', 'at_attachment', 'at_name', 'at_type',
    ];



    protected $primaryKey = 'at_id';
    const CREATED_AT = "at_created_at";
    const UPDATED_AT = "at_updated_at";
}
