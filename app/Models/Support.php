<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'message',
        'replay',
        'file',
    ];
    public function replays() {
        return $this->hasMany(Replay::class);
    }
}
