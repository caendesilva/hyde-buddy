<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'path',
        'label',
        'is_active',
    ];

    public function getPathAttribute($value)
    {
        return realpath($value);
    }

    public function getLabelAttribute($value)
    {
        return $value ?: basename($this->path);
    }

    public function getIsActiveAttribute($value)
    {
        return $value ? true : false;
    }

    public function setActive()
    {
        $this->is_active = true;
        $this->save();
        return $this;
    }

    public static function active()
    {
        return static::where('is_active', true)->first() ?? optional(static::first())->setActive();
    }
}
