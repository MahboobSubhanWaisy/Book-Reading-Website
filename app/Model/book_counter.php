<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class book_counter extends Model
{
    protected $fillable = [
        'bc_book_id','bc_client_id',
    ];

    /**
     * Get the record associated with the category.
     */
    public function client()
    {
        return $this->belongsTo('App\Model\client','bc_client_id', 'clt_id');
    }

    public function book()
    {
        return $this->belongsTo('App\Model\book', 'bk_id', 'fav_book_id');
    }

   

    protected $primaryKey = 'bc_id';
    const CREATED_AT = "bc_created_at";
    const UPDATED_AT = "bc_updated_at";
}
