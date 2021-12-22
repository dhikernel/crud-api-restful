<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'coments';

    protected $primarykey = 'id';

    protected $fillable = [
        'id_user',
        'id_post',
        'coment',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
