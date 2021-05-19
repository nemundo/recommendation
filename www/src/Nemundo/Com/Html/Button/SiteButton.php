<?php

namespace Nemundo\Com\Html\Button;


use Nemundo\Core\Language\Translation;
use Nemundo\Html\Button\Button;
use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Web\Site\AbstractSite;

class SiteButton extends AbstractSiteHHyperlink  // Button
{

    //use ContainerUserRestrictionTrait;
    //use HyperlinkTrait;

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var bool
     */
    //public $showSiteTitle = true;

    /**
     * @var string
     */
    //public $title;


    public function getContent()
    {

        //$this->checkContainerVisibility();

        //$this->checkObject('site', $this->site, AbstractSite::class);


        $this->label = $this->site->title;
        $this->href = $this->site->getUrl();

        if ($this->site !== null) {

            $content = $this->content;
            if ($content == null) {
                if ($this->showSiteTitle) {
                    $content = $this->site->title;
                }
            }

            $this->content = (new Translation())->getText($content);
            $this->href = $this->site->getUrl();

        }

        $this->loadHyperlink();

        return parent::getContent();

    }

}
