<?php

namespace App\Traits;

use App\Models\Player;
use App\Repository\PlayerRepository;

/**
 * 
 */
trait PlayerTrait
{
    private $repo;

    public function __construct(PlayerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function detailByUsername($userName)
    {
        $this->repo->setUsername($userName);

        return $this->repo->detailPlayerByUsername();
    }

    public function detailByUsernameAndPassword($userName, $password)
    {
        $this->repo->setUsername($userName);
        $this->repo->setPassword($password);

        return $this->repo->detail();
    }

    public static function setSessionPlayer($data)
    {
        session([
            'player_id' => $data->id,
            'username' => $data->username,
            'password' => $data->password
        ]);
    }

    public static function createPlayer($request)
    {
        $model           = new Player();
        $model->username = $request->username;
        $model->password = $request->password;
        $model->save();
        return $model;
    }
}
