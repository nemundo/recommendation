<?php


namespace Nemundo\Srf\Content\Episode;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;
use Nemundo\Srf\Player\SrfPlayer;

class TvEpisodeContentView extends AbstractContentView
{

    /**
     * @var TvEpisodeContentType
     */
    public $contentType;

    public function getContent()
    {

        $episodeRow = $this->contentType->getDataRow();

        $subtitle=new AdminSubtitle($this);
        $subtitle->content=$episodeRow->title;

        $p=new Paragraph($this);
        $p->content=$episodeRow->description;

        $small=new Small($this);
        $small->content=$episodeRow->show->show;

        $small=new Small($this);
        $small->content=$episodeRow->dateTime->getShortDateTimeLeadingZeroFormat();

        $small=new Small($this);
        $small->content= 'Length '. $episodeRow->length;


        $player= new SrfPlayer($this);
        $player->urn=$episodeRow->urn;
        $player->width = 400;
        $player->height = 300;

        return parent::getContent();

    }

}