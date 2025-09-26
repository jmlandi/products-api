<?php

namespace App\Http\Controllers;

use App\Dto\CreateColorJobDto;
use App\Jobs\CreateColorJob;
use App\Dto\UpdateColorJobDto;
use App\Jobs\UpdateColorJob;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateColorJobDto(name: $request->input('name'));
        CreateColorJob::dispatch($data);
        return response()->json(['message' => 'job enqeued'], 202);
    }

    public function updateName(Request $request) {
        $data = new UpdateColorJobDto(
            id: $request->input('id'),
            name: $request->input('name')
        );
        UpdateColorJob::dispatch($data);
        return response()->json(['message' => 'job enqeued'], 202);
    }
}
