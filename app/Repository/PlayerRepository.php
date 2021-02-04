<?php

namespace App\Repository;

use App\Models\Player;

class PlayerRepository
{
    protected $username;
    protected $playerId;
    protected $password;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;
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

    public function detailPlayerById()
    {
        return Player::where('id', $this->playerId)
            ->first();
    }

    public static function listPlayer()
    {
        return Player::get();
    }
}
