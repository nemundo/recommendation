<?php

namespace Nemundo\Com\Html\Hyperlink;


use Nemundo\Core\Language\Translation;
use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Web\Site\AbstractSite;

class SiteHyperlink extends AbstractHyperlink
{

    //use ContainerUserRestrictionTrait;
    use HyperlinkTrait;

    /**
     * @var AbstractSite
     */
    public $site;

    /**
     * @var bool
     */
    public $showSiteTitle = true;

    /**
     * @var string
     */
    public $title;


    public function getContent()
    {

        $this->checkContainerVisibility();

        //$this->checkObject('site', $this->site, AbstractSite::class);

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
