<?php namespace App\Models;

class Reference extends BaseModel {
    protected $primaryKey = 'slug';
    public $incrementing = 'false';

    public function endpoints() {
        return $this->hasMany(Endpoint::class);
    }
}
