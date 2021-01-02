<?php

namespace App;
use App\Stock;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','brand','price','category'];
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
}
