<?php

namespace App\Helpers;

class YoutubeHelper
{
    /**
     * Get Youtube Video ID by URL
     *
     * @param string $url yotube video url
     */
    public static function getVideoID($url): string
    {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        return $matches[0];
    }
}
