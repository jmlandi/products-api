<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dto\CreateImageJobDto;
use App\Jobs\CreateImageJob;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $data = new CreateImageJobDto(
            imageUrl: $request->input('image_url'),
            altText: $request->input('alt_text')
        );
        CreateImageJob::dispatch();
        return response()->json(["message" => "Image upload job dispatched"], 202);
    }
}
