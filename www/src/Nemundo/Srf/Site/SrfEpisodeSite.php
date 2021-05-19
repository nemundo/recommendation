<?php


namespace Nemundo\Srf\Site;


use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Process\App\Share\Content\ShareContentType;
use Nemundo\Srf\Content\Episode\SrfEpisodeContentType;
use Nemundo\Srf\Page\EpisodePage;
use Nemundo\Srf\Parameter\EpisodeParameter;
use Nemundo\Web\Site\AbstractSite;

class SrfEpisodeSite extends AbstractSite
{

    /**
     * @var SrfEpisodeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'episode';
        $this->menuActive = false;

        SrfEpisodeSite::$site = $this;

    }


    public function loadContent()
    {

        (new EpisodePage())->render();


        /*
        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $episodeId = (new EpisodeParameter())->getValue();

        $episodeContentType = new SrfEpisodeContentType($episodeId);
        $episodeContentType->getView($page);


        /*
        $share=new ShareContentType();
        $share->parentId=$episodeContentType->getContentId();
        $share->getForm($page);
*/



       // $page->render();



    }


}