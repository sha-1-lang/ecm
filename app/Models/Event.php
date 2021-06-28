<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['event_name','time','location','group_name','description','status'];
    protected $table = 'event';
}
