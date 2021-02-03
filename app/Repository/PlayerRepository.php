<?php

namespace App\Repository;

use App\Models\Player;

class PlayerRepository
{
    protected $username;
    protected $password;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function detail()
    {
        return Player::where('username', $this->username)
            ->where('password',$this->password)
            ->first();
    }

    public function detailPlayerByUsername()
    {
        return Player::where('username', $this->username)
            ->first();
    }

    public static function listPlayer()
    {
        return Player::get();
    }
}
