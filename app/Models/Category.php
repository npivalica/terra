<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public static function validate($request){
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'required' => 'The :attribute field is required.',
            'name.max' => 'Name must not be longer than :max characters.'
        ]);
    }
}
