<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['content_id', 'answer', 'orderId'];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
}
