<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function download($id)
{
    $file = File::findOrFail($id);

    return Storage::download($file->path, $file->nom);
}
}
