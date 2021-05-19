<?php


namespace Nemundo\Content\App\Feed\Content\Item;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Player\AudioPlayer;

class FeedItemContentView extends AbstractContentView
{

    /**
     * @var FeedItemContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='62d31020-a14b-496d-bb87-fd3007e0cbd5';
        $this->defaultView=true;

    }


    public function getContent()
    {

        $itemRow = $this->contentType->getDataRow();

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $itemRow->feed->title;

        $hyperlink=new UrlHyperlink($this);
        $hyperlink->openNewWindow=true;
        $hyperlink->url=$itemRow->url;

        $title=new AdminTitle($hyperlink);
        $title->content=$itemRow->title;

        $small = new Small($this);
        $small->content = $itemRow->dateTime->getShortDateTimeLeadingZeroFormat();

        $p=new Paragraph($this);
        $p->content= $itemRow->description;

        if ($itemRow->hasAudio) {
            $player=new AudioPlayer($this);
            $player->src=$itemRow->audioUrl;
        }


        return parent::getContent();

    }

}