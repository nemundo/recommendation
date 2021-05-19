<?php

namespace Nemundo\Admin\Com\Button;


use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Core\Language\Translation;
use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;

// SearchIconAdminButton
class AdminIconSiteButton extends AbstractHyperlink
{

    use ContainerUserRestrictionTrait;

    /**
     * @var AbstractIconSite
     */
    public $site;

    /**
     * @var bool
     */
    public $showTitle = true;

    public function getContent()
    {

        $this->site->icon->iconSize = 2;
        $this->addCssClass('p-2');


        if ($this->checkUserVisibility()) {

            $this->addContainer($this->site->icon);

            $this->href = $this->site->getUrl();

            if ($this->showTitle) {
                $this->title = (new Translation())->getText($this->site->title);
            }

        }

        return parent::getContent();

    }

}