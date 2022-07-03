<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", request()->video_url, $matches);
        $video_id = $matches[0];

        // All Thubnails URL
        $thumbnails = collect([
            ['quality' => 'mq', 'url' => "http://img.youtube.com/vi/$video_id/mqdefault.jpg"],
            ['quality' => 'hq', 'url' => "http://img.youtube.com/vi/$video_id/hqdefault.jpg"],
            ['quality' => 'sd', 'url' => "http://img.youtube.com/vi/$video_id/sddefault.jpg"],
            ['quality' => 'hd', 'url' => "http://img.youtube.com/vi/$video_id/maxresdefault.jpg"],
        ]);

        return back()->with(['thumbnails' => $thumbnails]);
    }
}
