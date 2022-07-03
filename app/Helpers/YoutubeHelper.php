<?php

namespace App\Helpers;

class YoutubeHelper
{
    /**
     * Get Youtube Video ID by URL
     *
     * @param string $url yotube video url
     */
    public static function getVideoID($url)
    {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        return $matches[0];
    }

    /**
     * Get Youtube Video Thumbnails by video id
     *
     * @param string $id youtube video id
     */
    public static function getThumbnails($id)
    {
        return collect([
            ['quality' => 'mq', 'url' => "http://img.youtube.com/vi/$id/mqdefault.jpg"],
            ['quality' => 'hq', 'url' => "http://img.youtube.com/vi/$id/hqdefault.jpg"],
            ['quality' => 'sd', 'url' => "http://img.youtube.com/vi/$id/sddefault.jpg"],
            ['quality' => 'hd', 'url' => "http://img.youtube.com/vi/$id/maxresdefault.jpg"],
        ]);
    }
}
