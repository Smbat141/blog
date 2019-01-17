<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;


class Category extends Model{

    protected  $fillable = ['title','slug','parent_id','published','created_by','modified_by'];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }
    public function children(){
        return $this->hasMany(self::class,'parent_id');
    }
}
