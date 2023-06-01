<?php

namespace App\Models;

use Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ShortLink extends Model
{
    use HasFactory;

    protected $table = 'short_links';

    protected $fillable = [
        'identificador', 'url_mini', 'url_link', 'num_acessos'
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

    public function regras()
    {
        return [
            'link' => 'required',
            'identificador' => 'unique:short_links',
        ];
    }

}
