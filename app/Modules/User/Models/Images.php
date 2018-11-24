<?php
/**
 * Created by PhpStorm.
 * User: malikyousfi
 * Date: 11/23/18
 * Time: 8:34 PM
 */

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'users_images';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'status',
        'user_id'
    ];



}