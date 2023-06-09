<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */

    protected $table = 'module';

    protected $fillable = ['user_id', 'title', 'description'];

    /**
     * A job belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
