<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buddy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images(): HasMany {
        return  $this->hasMany(BuddyImage::class);
    }
}
