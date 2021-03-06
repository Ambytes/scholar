<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     *  Relation: A user has one school class.
     * 
     *  Note: Administrators, school staff and teachers also need a school class.
     *        This could be the empty standard id=1 or a custom one with a name like "Administration" or "College Teachers" and so on.
     */
    public function schoolClass() {
        return $this->hasOne(SchoolClass::class, 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'forename', 'surname', 'email', 'password', 'city', 'street', 'birthdate', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'rank'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'birthdate'
    ];
}
