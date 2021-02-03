<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player';

    /**
     * Scenario Validation Model
     */
    public static $rules = [
        'username' => 'required|min:5',
        'password' => 'required|min:5',
    ];
}
