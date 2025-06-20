<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'description',
    'price',
    'stock',
    'image',
    'category', 
];
    
    // Add this relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function getImageUrlAttribute()
{
    if (!$this->image) {
        return asset('images/placeholder.jpg');
    }

    // Check storage path first
    $storagePath = 'storage/' . $this->image;
    if (file_exists(public_path($storagePath))) {
        return asset($storagePath);
    }

    // Check public/images as fallback
    $publicPath = 'images/' . $this->image;
    if (file_exists(public_path($publicPath))) {
        return asset($publicPath);
    }

    // Default placeholder
    return asset('images/placeholder.jpg');
}
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function booted()
{
    static::addGlobalScope('ignore_status', function ($builder) {
        $builder->getQuery()->wheres = collect($builder->getQuery()->wheres)
            ->reject(function ($where) {
                return isset($where['column']) && $where['column'] === 'status';
            })
            ->values()
            ->all();
    });
}
}
