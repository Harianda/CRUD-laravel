<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primarykey = 'id_post';
    public $fillable = [
        'id_user',
        'title',
        'picture',
    ];

    public function user(){
        return $this->belongsTo(modeluser::class, 'id_user');
    }
    
}
