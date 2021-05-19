<?php

namespace Nemundo\Content\App\Dashboard\Content;


use Nemundo\Content\App\Dashboard\Content\Dashboard\DashboardContentType;
use Nemundo\Content\App\Dashboard\Content\DashboardColumn\DashboardColumnContentType;
use Nemundo\Content\App\Dashboard\Content\UserDashboard\UserDashboardContentType;
use Nemundo\Content\Collection\AbstractContentTypeCollection;

class DashboardContentTypeCollection extends AbstractContentTypeCollection
{

    protected function loadCollection()
    {

        $this
            ->addContentType(new DashboardContentType())
            ->addContentType(new DashboardColumnContentType())
            ->addContentType(new UserDashboardContentType());

    }

}