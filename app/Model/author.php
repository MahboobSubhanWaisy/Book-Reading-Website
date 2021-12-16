<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class author extends Model
{


	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'atr_name','atr_last_name', 'atr_email','atr_phone_number', 'atr_bio','atr_photo',
    ];



    protected $primaryKey = 'atr_id';
    const CREATED_AT = "atr_created_at";
    const UPDATED_AT = "atr_updated_at";
    public $table = 'authors';
}
