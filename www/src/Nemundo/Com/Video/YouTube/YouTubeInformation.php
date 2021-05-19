<?php


namespace Nemundo\Com\Video\YouTube;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Http\Url\UrlInformation;

class YouTubeInformation extends AbstractBase
{

    public function getYouTubeIdFromUrl($url)
    {

        $youtubeId = (new UrlInformation($url))->getParameterValue('v');
        return $youtubeId;

    }

}