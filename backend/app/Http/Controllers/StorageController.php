<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function available()
    {
        return Storage::all();
    }
}
