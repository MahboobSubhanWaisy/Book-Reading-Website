<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $fillable = [
        'fav_client_id','fav_book_id',
    ];

    /**
     * Get the record associated with the category.
     */
    public function client()
    {
        return $this->hasOne('App\Model\client','clt_id', 'fav_client_id');
    }

    public function book()
    {
        return $this->hasOne('App\Model\book', 'bk_id', 'fav_book_id');
    }

    // public function book_attachment()
    // {
    //     return $this->hasMany('App\Model\book_attachment', 'at_book_id','bk_author_id');
    // }

   

    protected $primaryKey = 'bc_id';
    const CREATED_AT = "fav_created_at";
    const UPDATED_AT = "fav_updated_at";
}
