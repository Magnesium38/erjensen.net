<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package App\Models
 * @mixin \Eloquent
 */
abstract class BaseModel extends Model {
    /**
     * The attributes that are not mass assignable.
     * By default, assume every is safe for mass assignment.
     * Individual models can alter this as needed.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden when converted to an
     * array or to JSON.
     * By default, hide the timestamps.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The plural name of the model for use in API results.
     *
     * @var string
     */
    protected static $pluralName = 'data';

    public static function getPluralName() {
        return static::$pluralName;
    }

    public static function test($args) {
        BaseModel::findOrFail($args);
    }
}
