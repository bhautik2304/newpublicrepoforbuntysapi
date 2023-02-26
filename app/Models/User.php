<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\{Hash, Mail};
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected static function booted()
    {
        static::addGlobalScope('store', function (Builder $builder) {
            return $builder->with(['staff','session','sessionStatus']);
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'store_id',
        'staff_id',
        'name',
        'role',
        'email',
        'mobaile',
        'divice_id',
        'password',
        'otp',
        'otptoken',
        'sessiontoken',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function role()
    // {
    //     # code...
    //     return $this->belongsTo(roletype::class, 'role_id', 'id');
    // }

    public function staff()
    {
        # code...
        return $this->belongsTo(staff::class, 'staff_id', 'id');
    }

    public function session()
    {
        # code...
        return $this->hasMany(session::class, 'user_id', 'id');
    }

    public function sessionStatus()
    {
        # code...
        return $this->hasMany(session::class, 'user_id', 'id')->select('session_status');
    }

    public function otp()
    {
        # code...
        $otp = rand(0000, 9999);
        $this->update(['otp' => $otp]);
        return $otp;
    }

    public function changePassoword($password)
    {
        # code...
        return $this->update(['password' => Hash::make($password)]);
    }

    public function makeOtpTocken()
    {
        # code...
        $token = Str::uuid();
        $this->update(['otptoken' => $token]);
        return $token;
    }

    public function startSession($user)
    {
        # code...
        if($user->role == "store"){
            store::find($user->store_id)->update([
                'session_start'=>date('H:i:s')
            ]);
        }
        $token = Str::uuid();
        $this->update(['sessiontoken' => $token]);
        $this->update(['session' => true]);
        $role= ($user->role=="masteradmin" || $user->role=="staff" || $user->role=="developer") ? "user":
        (($user->role=="costumer") ? "costomer": "store");
        $session=new session;
        $session->usertype=$role;
        $session->user_id=$user->id;
        $session->start=date('Y-m-d H:i:s');
        $session->session_status=true;
        $session->save();

        return [$token,$session->id];
    }

    public function endSession($id)
    {
        # code...
        $this->update(['sessiontoken' => null]);
        $this->update(['session' => false]);
        session::find($id)->update(["end"=>date('Y-m-d H:i:s'), "session_status"=>false,]);
        return 1;
    }
}
