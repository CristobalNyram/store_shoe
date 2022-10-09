<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Shoe extends Model
{
    //  use Sluggable;

    use HasFactory;
/*
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate'=>true
            ]
        ];
    }
*/
    protected $fillable=['title','description','price','stock','user_id','category_id','model_id','brand_id'];

    public function  getImageAttribute()
    {

            // return url("storage/app/public/".$this->image_url);

    }

}
