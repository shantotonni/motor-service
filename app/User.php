<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name', 'email', 'password','username','company_id','role_id','designation','mobile','is_active','kpi_type_id','is_ssr'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_area(){
        return $this->hasOne('App\UserArea');
    }

    public function user_territory(){
        return $this->hasOne('App\UserTerritory');
    }
   
    public function company(){
        return $this->belongsTo('App\Company');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function kpi_type(){
        return $this->belongsTo('App\KpiType');
    }

    public function get_supervisor(){
        
    }

}
