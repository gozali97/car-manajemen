<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Car extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function  scopeFiltered(Builder $quary)  {
        $quary
            ->when(request('brands'), function (Builder $q)  {
                $q->whereIn('brand_id',request('brands'));
            })
            ->when(request('categories'), function (Builder $q)  {
                $q->whereIn('category_id',request('categories'));
            })
            ->when(request('prices'), function(Builder $q)  {
                $q->whereBetween('price',[
                    request('prices.from',0),
                    request('prices.to', 100000),
                ]);
            });

    }
}
