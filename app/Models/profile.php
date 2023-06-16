<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey = 'id_profile';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'nama',
        'alamat',
        'notlp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
