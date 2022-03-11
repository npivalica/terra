<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = Menu::getMenu();
    }
}
