<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bk_category_id', 'bk_author_id', 'bk_title', 'bk_description', 'bk_publish_date', 'bk_cover_photo','bk_file_type', 'bk_file_location', 'bk_region',
    ];

    /**
     * Get the record associated with the category.
     */
    public function category()
    {
        return $this->hasOne('App\Model\categories','ct_id', 'bk_category_id');
    }
    
    public function author()
    {
        return $this->belongsTo('App\Model\author', 'bk_author_id', 'atr_id');
    }

    public function favorite()
    {
        return $this->hasOne('App\Model\favorite', 'fav_book_id', 'bk_id');
    }

    public function book_attachment()
    {
        return $this->hasMany('App\Model\book_attachment', 'at_book_id','bk_id');
    }

    public function book_counter()
    {
        return $this->hasMany('App\Model\book_counter', 'bc_book_id','bk_id');
    }

    public function book_rating()
    {
        return $this->belongsToMany('App\Model\client', 'book_rating', 'br_book_id', 'br_client_id')->withPivot(['br_rating_number', 'br_comment', 'br_created_at']);
    }

    
    
    protected $primaryKey = 'bk_id';
    const CREATED_AT = "bk_created_at";
    const UPDATED_AT = "bk_updated_at";
  }
