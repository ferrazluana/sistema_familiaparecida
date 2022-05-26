<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministerio extends Model
{
    protected $fillable = [
        'name',
        'description',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ministerios/' . $this->getKey());
    }

    public function membros()
    {
        return $this->belongsToMany(Membro::class);
    }
}
