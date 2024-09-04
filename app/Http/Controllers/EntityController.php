<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class EntityController extends Controller
{
    public function huntEntities(Request $request) {
        $url = $request->input('url');
    
        $process = new Process([env('PYTHON_PATH', 'python'), base_path('app/Helpers/entity_extractor.py'), $url]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();
        $entities = json_decode($output, true);

        return response()->json($entities);
    }
}
