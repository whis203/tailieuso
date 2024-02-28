<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'user_id', 'content', 'rating'];
    protected $table = 'comment';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }
}
