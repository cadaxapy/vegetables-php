<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    public function vegetable()
    {
        return $this->belongsTo(Vegetable::class);
    }
}
