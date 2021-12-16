<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class client extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clt_name','clt_email', 'clt_email_verified_at','clt_password', 'clt_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }


    protected $hidden = [
        'clt_password', 'clt_remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'clt_email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'clt_id';
    const CREATED_AT = "clt_created_at";
    const UPDATED_AT = "clt_updated_at";

    public function getAuthPassword()
    {
        return $this->clt_password;
    }
}
