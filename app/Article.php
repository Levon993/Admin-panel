<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'id',
        'title',
        'slug',
        'description_short',
        'description',
        'image',
        'image_show',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'published',
        'viewed',
        'created_by',
        'modified_by'




    ];
    protected $table = 'articles';


    public function categories(){
        return $this->morphToMany(Category::class, 'categoryable');
    }

    public function setSlugAttribute($value){

        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }


    public function scopeLastArticles($query, $count){
        return $query->orderBy('created_at', 'DESC')->take($count)->get();

    }








}
