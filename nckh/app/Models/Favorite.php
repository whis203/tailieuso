<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity']; // Các trường có thể gán dữ liệu

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'favorites';

    // Không sử dụng timestamps (created_at, updated_at)
    public $timestamps = false;

    // Định nghĩa quan hệ với mô hình User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Định nghĩa quan hệ với mô hình Product
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
