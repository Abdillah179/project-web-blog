<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];


    public function scopeFilterring($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where("title", "like", "%" . $search . "%")
                ->orWhere("slug_category", "like", "%" . $search . "%")
                ->orWhere("published_at", "like", "%" . $search . "%")
                ->orWhere("negara", "like", "%" . $search . "%");
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
