<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
         'name',
         'price',
         'image',
         'description',
         'stock',
         'availability',
    ];
    public function getAvailabilityAttribute(){
        return $this->stock > 0;
    }
    public function scopeFilter($query, $filters){
        if(isset($filters['search'])){
            $query->where('name', 'like', '%'.request('search').'%');
        }
    }
}
