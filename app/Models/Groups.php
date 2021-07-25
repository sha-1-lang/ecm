<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Groups extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'accounts','selected_group','no_of_groups'];
    protected $table = 'groups';

    public function emails(): BelongsToMany
    {
        return $this->belongsToMany(Email::class, 'group_id')
            ->withPivot([
                'id'
            ])
            ->using(Groups::class);
    }

   


}
