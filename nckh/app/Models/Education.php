<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'donvi',
        'mahp',
        'tenhp',
        'tenvt',
        'main',
        'mota',
        'sotinchi',
        'muctieu',
        'khoa_id'
    ];
    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id');
    }
}
