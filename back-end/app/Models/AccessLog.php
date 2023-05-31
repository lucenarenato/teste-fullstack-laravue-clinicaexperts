<?php

namespace App\Models;

use Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;


class AccessLog extends Model
{
    protected $table = 'access_log';

    protected $fillable = [
        'ip', 'ip_local', 'data', 'pais', 'continente', 'latitude', 'longitude', 'cidade', 'user_agente', 'num_acessos'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => User::class
    ];

}
