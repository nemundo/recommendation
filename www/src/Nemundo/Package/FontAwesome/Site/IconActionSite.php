<?php

namespace Nemundo\Package\FontAwesome\Site;


use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;

class IconActionSite extends ActionSite
{

    use IconSiteTrait;

    public function __construct(AbstractActionPanel $panel)
    {
        $this->loadIcon();
        parent::__construct($panel);
    }

}