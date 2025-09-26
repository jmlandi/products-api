<?php

namespace App\Http\Controllers;

use App\Dto\CreateTagJobDto;
use App\Jobs\CreateTagJob;
use App\Dto\UpdateTagJobDto;
use App\Jobs\UpdateTagJob;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateTagJobDto(name: $request->input('name'));
        CreateTagJob::dispatch($data);
        return response()->json(['message' => 'job enqeued'], 202);
    }

    public function updateName(Request $request) {
        $data = new UpdateTagJobDto(
            id: $request->input('id'),
            name: $request->input('name')
        );
        UpdateTagJob::dispatch($data);
        return response()->json(['message' => 'job enqeued'], 202);
    }
}
