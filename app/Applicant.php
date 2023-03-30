<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */

    protected $table = 'applicant';

    protected $fillable = ['user_id', 'module_id', 'description', 'path'];
    
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
