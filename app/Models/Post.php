<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $primarykey = 'id';

    protected $fillable = [
        'id_user',
        'title',
        'content',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
