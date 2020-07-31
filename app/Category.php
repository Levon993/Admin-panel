<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'id',
         'title',
        'slug',
        'parent_id',
        'published',
        'created_at',
        'modified_by'

    ];

    public function setSlugAttribute($value){

        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }



    public function children(){
        return $this->hasMany(self::class, 'parent_id', 'id');

    }
    public function articles(){
        return $this->morphedByMany(Article::class, 'categoryable');
    }

    public function scopeLastCategories($query, $count){
        return $query->orderBy('created_at', 'DESC')->take($count)->get();

    }

}


