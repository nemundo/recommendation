<?php

namespace Nemundo\Web\Action\Site;

use Nemundo\Package\FontAwesome\Icon\ActiveIcon;
use Nemundo\Package\FontAwesome\Site\IconSiteTrait;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;

class ActiveActionSite extends ActionSite
{

    use IconSiteTrait;

    public function __construct(AbstractActionPanel $panel)
    {
        parent::__construct($panel);
        $this->icon = new ActiveIcon();
    }

}