<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ct_title', 'ct_description', 'ct_title_dari', 'ct_description_dari', 'ct_title_pashto', 'ct_description_pashto',
    ];



    protected $primaryKey = 'ct_id';
    const CREATED_AT = "ct_created_at";
    const UPDATED_AT = "ct_updated_at";
    public $table = 'categories';


     public function books()
    {
        return $this->hasMany('App\Model\book', 'bk_category_id','ct_id');
    }
}
