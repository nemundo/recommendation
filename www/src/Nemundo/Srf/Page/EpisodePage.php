<?php


namespace Nemundo\Srf\Page;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Srf\Com\Player\SrfPlayer;
use Nemundo\Srf\Data\Episode\EpisodeReader;
use Nemundo\Srf\Parameter\EpisodeParameter;

use Nemundo\Srf\Template\SrfTemplate;

class EpisodePage extends SrfTemplate
{

    public function getContent()
    {

        $episodeId = (new EpisodeParameter())->getValue();

        $episodeReader = new EpisodeReader();
        $episodeReader->model->loadShow();

        $episodeRow = $episodeReader->getRowById($episodeId);

        $title = new AdminTitle($this);
        $title->content = $episodeRow->title;

        $p = new Paragraph($this);
        $p->content = $episodeRow->description;


        $player = new SrfPlayer($this);
        $player->urn = $episodeRow->urn;
        $player->width = 800;
        $player->height = 700;
        $player->autoPlay = true;


        return parent::getContent();

    }

}