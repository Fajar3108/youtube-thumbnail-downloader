<?php

namespace App\Http\Controllers;

use App\Helpers\YoutubeHelper;
use App\Models\History;

class YoutubeController extends Controller
{
    // Download Thubnail by Youtube Video URL
    public function download_thumbnail()
    {
        // Validate URL with REGEX
        request()->validate([
            'video_url' => ['required', 'regex:/.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/']
        ]);

        // GET Video ID
        $video_id = YoutubeHelper::getVideoID(request()->video_url);

        // All Thubnails URL
        $thumbnails = YoutubeHelper::getThumbnails($video_id);

        // Create Usage History
        History::create([
            'url' => request()->video_url,
        ]);

        // Return with Thumbnails
        return back()->with(['thumbnails' => $thumbnails]);
    }
}
