<?php

namespace Nemundo\Web\Action;

use Nemundo\Web\Site\Site;


// IconActionSite
// DeleteActionSite

class ActionSite extends Site
{

    use ActionSiteTrait;

    public function __construct(AbstractActionPanel $panel)
    {
        parent::__construct(null);
        $panel->addActionSite($this);
    }

}