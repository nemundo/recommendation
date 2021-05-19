<?php


namespace Nemundo\Content\App\Video\Content\YouTube;


use Nemundo\Com\Video\YouTube\YouTubePlayer;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Helper\Ratio\BootstrapAspectRatio;
use Nemundo\Package\Bootstrap\Helper\Ratio\BootstrapRatioDiv;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;


class YouTubeContentView extends AbstractContentView
{

    /**
     * @var YouTubeContentType
     */
    public $contentType;

    public $viewName = 'Video';


    protected function loadView()
    {

        $this->viewName = 'default';
        $this->viewId = 'f4c68029-6d55-4bec-8352-6d11da635fae';
        $this->defaultView = true;

    }


    public function getContent()
    {

        $youtubeRow = $this->contentType->getDataRow();

        $div = new BootstrapRatioDiv($this);
        $div->aspectRatio = BootstrapAspectRatio::RATIO_16_9;

        /*
        $img = new BootstrapResponsiveImage($this);
        $img->src='https://img.youtube.com/vi/'.$youtubeRow->youtubeId.'/0.jpg';
*/


        $player = new YouTubePlayer($div);
        $player->videoId = $youtubeRow->youtubeId;
        $player->autoPlay = true;

        return parent::getContent();

    }

}