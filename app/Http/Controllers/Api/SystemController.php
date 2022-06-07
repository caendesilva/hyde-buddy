<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function openFile(Request $request) 
    {
        $path = $request->get('path');

        if (file_exists($path)) {
            shell_exec("start \"\" \"{$path}\"");
            return redirect()->back()->with('toast', 'File opened successfully.');
        }

        return response()->json([
            'error' => 'File not found.',
        ], 404);
    }
}
