<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectFileProxyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $path, Request $request)
    {
        $qualifiedPath = Project::active()->path . '/' . $path;

        if (!file_exists($qualifiedPath)) {
            abort(404);
        }

        if (is_dir($qualifiedPath)) {
            return response()->json([
                'error' => 'Cannot proxy a directory',
            ], 400);
        }

        return response()->file($qualifiedPath);
    }
}
