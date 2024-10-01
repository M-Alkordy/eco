<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'support_id',
    ];

    public function support() {
        return $this->belongsTo(Support::class);
    }
}
