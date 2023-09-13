<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuddyImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];
    protected $appends = ['src'];

    public function buddy(): BelongsTo {
        return $this->belongsTo(Buddy::class);
    }

    public function getSrcAttribute() {
        return asset("storage/{$this->filename}");
    }
}
