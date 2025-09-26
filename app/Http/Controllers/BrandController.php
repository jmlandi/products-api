<?php

namespace App\Http\Controllers;

use App\Dto\CreateBrandJobDto;
use App\Jobs\CreateBrandJob;

use App\Dto\UpdateBrandJobDto;
use App\Jobs\UpdateBrandJob;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateBrandJobDto(name: $request->input('name'));
        CreateBrandJob::dispatch($data);
        return response()->json(['message' => 'job enqueued'], 202);
    }

    public function updateName(Request $request) {
        $data = new UpdateBrandJobDto(
            id: $request->input('id'),
            name: $request->input('name')
        );
        UpdateBrandJob::dispatch($data);
        return response()->json(['message' => 'job enqueued'], 202);
    }
}