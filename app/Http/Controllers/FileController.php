<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function logo($path)
    {
        return Storage::response('logos/'.$path);
    }

}
