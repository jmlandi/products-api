<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dto\CreateImageJobDto;
use App\Dto\UpdateImageAltTextJobDto;
use App\Jobs\CreateImageJob;
use App\Jobs\UpdateImageAltTextJob;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateImageJobDto(
            image_url: $request->input('image_url'),
            alt_text: $request->input('alt_text')
        );
        CreateImageJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }

    public function updateAltText(Request $request)
    {
        $data = new UpdateImageAltTextJobDto(
            id: $request->id,
            alt_text: $request->alt_text,
        );
        UpdateImageAltTextJob::dispatch($data);
        return response()->json(["message" => "job enqeued"], 202);
    }
}
