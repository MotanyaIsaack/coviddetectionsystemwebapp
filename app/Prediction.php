<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'prediction',
        'x_ray_image_name'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
