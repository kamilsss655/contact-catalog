<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Contact extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'first_name'    =>      32,
            'email'         =>      100,
            'last_name'     =>      32,
            'phone'         =>      20,
            'city'          =>      64,
            'county'        =>      32,
            'zip_code'      =>      10
        ]
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
