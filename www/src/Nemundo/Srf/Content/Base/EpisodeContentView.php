<?php


namespace Nemundo\Srf\Content\Base;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Formatting\Small;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Srf\Com\Player\SrfPlayer;
use Nemundo\Srf\Content\TvEpisode\TvEpisodeContentType;


class EpisodeContentView extends AbstractContentView
{

    /**
     * @var AbstractEpisodeContentType
     */
    public $contentType;


    protected function loadView()
    {
        // TODO: Implement loadView() method.

        $this->viewId='f77b29f2-6ec2-419d-a219-4c676345de14';
        $this->viewName='default';
        $this->defaultView=true;

    }


    public function getContent()
    {

        $episodeRow = $this->contentType->getDataRow();

        //$subtitle=new AdminSubtitle($this);
        //$subtitle->content=$episodeRow->title;

        $p=new Paragraph($this);
        $p->content=$episodeRow->description;

        $player= new SrfPlayer($this);
        $player->urn=$episodeRow->urn;
        $player->width = 400;
        $player->height = 300;


        $div=new Div($this);

        $small=new Small($div);
        $small->content=$episodeRow->show->show;

        $div=new Div($this);
        $small=new Small($div);
        $small->content=$episodeRow->dateTime->getShortDateTimeLeadingZeroFormat();

        $div=new Div($this);
        $small=new Small($div);
        $small->content= 'Length: '. $episodeRow->length;



        return parent::getContent();

    }

}