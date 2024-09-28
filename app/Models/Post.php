<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //filled from another source
    protected $fillable = [
        'title',
        'body'
    ];
    //relationship where a post belongs to a user
    public function user () : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
