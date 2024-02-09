<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected  $fillable = [
        'category_id',
        'name',
        'price',
        'quantity',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function customers(){
        return $this->belongsToMany(Customer::class);
    }
}
