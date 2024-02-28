<?php

namespace App\Models;

use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Commentable;
}
