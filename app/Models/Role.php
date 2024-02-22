<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = array();
    protected $primaryKey = 'id';
    protected $table = 'roles';
    public function role()
    {
        return $this->belongsTo(User::class);
    }
}
