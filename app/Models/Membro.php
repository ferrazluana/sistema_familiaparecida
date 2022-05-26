<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'phone',
        'address',
        'marital_status',
        'personality',
        'description',
        'isBaptized',
        'isLeader',
        'isPastor',
        'status_id',
        'spouse_name',
        'wedding_date',
        'baptized_date',
        'discipler',
    
    ];
    
    
    protected $dates = [
        'birth_date',
        'wedding_date',
        'baptized_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/membros/'.$this->getKey());
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function ministerios()
    {
        return $this->belongsToMany(Ministerio::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
