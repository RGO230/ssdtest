<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['cover','title','descr','price','category_id'];
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
    public function photoes()
    {
        return $this->hasMany(Photo::class);
    }
    public function delete() {
        $files = $this->photoes()->get();
        foreach ($files as $file) {
          Storage::delete([$file['path']]);
        }
        $this->photoes()->delete();
        parent::delete();
      }
    
      public function deletePrevios($savedFiles) {
        $files = $this->photoes()->whereNotIn('id', $savedFiles)->get();
        foreach ($files as $file) {
          Storage::delete([$file['path']]);
        }
        $this->photoes()->whereNotIn('id', $savedFiles)->delete();
      }
      public function carts() {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}
