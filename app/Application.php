<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */

    protected $table = 'application';

    protected $fillable = ['user_id', 'board_id', 'description'];
    
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
