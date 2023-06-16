<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    use HasFactory;

    protected $table = 'user_roles';
    protected $primaryKey = 'id_userrole';
    public $timestamps = true;

    protected $fillable = [
        'id_role',
        'id_user',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
