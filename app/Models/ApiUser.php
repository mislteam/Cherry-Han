<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    protected $fillable = [
         'name',
        'email',
        'phone',
        'state_id',
        'city_id',
        'address',
        'created_by',
        'password',
        'shop_info',
        'isAgent',
        'token_valid_period',
        'is_active'
    ];

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function tokenList()
    {
        return $this->tokens()
            ->select('token','token_expires_at','is_active')
            ->where('token_expires_at','>',date('Y-m-d H:i:s'))
            ->get();
    }

    public function deleteTokens()
    {
        foreach ($this->tokens as $token) {
            $token->delete();
        }
    }

    public function toggleUserActivation()
    {
        $this->is_active = !$this->is_active;
        $this->save();
        return $this->is_active;
    }
     public function toggleTokenApprove($is_active)
    {
        //$this->is_active = !$this->is_active;
        $this->is_active = $is_active;
        $this->created_by=auth()->id();
        $this->save();
        return $this->is_active;
    }
}
