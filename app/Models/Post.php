<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function canEdit()
    {
        $user = Auth::user();

        return $user && ($this->user_id === $user->id || $user->is_admin === 1);
    }
}
