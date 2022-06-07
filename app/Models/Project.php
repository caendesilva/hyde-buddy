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

    protected static function booted()
    {
        static::retrieved(function ($project) {
            if ($project->is_active) {
                // We save the active project to file so that we can determine if we have an active project
                // when we boot the application, as we do not have access to the database and cache drivers.
                file_put_contents(app('databasePath') . '/activeProject', $project->path);
            }
        });
    }

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
