<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'csl';
    
    protected $table = 'WebSiteUser';
    
    public $timestamps = false;
    
    protected $fillable = [
        'csl',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'stdcode',
        'mobileno',
        'websiteusername',
        'websiteuserpassword',
        'websiteuserstatuscode',
        'emailstatus',
        'mobilenostatus',
        'emailotp',
        'mobilenootp',
        'insertauthor',
        'INSERTTIME',
        'inserttime',
        'updateauthor',
        'updatetime',  
    ];
    

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->websiteuserpassword;
    }

}
