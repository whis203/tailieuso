<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Products extends Model
{
    use HasFactory;
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_detail',
        'product_img',
        'product_file',
        'user_id',
        'totalstar',
        'category',
        'views',
        'downloads'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function getTotalRating()
    {
        return $this->comments()->sum('rating');
    }
}
