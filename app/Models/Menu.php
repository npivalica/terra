<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'route',
        'order'
    ];

    public static function getMenu(){
        return Menu::orderBy('order')->get();
    }

    public static function validate($request){
        $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|max:255'
        ], [
            'required' => 'The :attribute field is required.',
            'name.max' => 'Name must not be longer than :max characters.',
            'route.max' => 'Route must not be longer than :max characters.'
        ]);
    }
}
