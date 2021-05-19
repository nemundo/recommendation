<?php

namespace Nemundo\Web\Url;


use Nemundo\Core\Base\AbstractBase;


class UrlRefresh extends AbstractBase
{

    public function refresh()
    {
        header('Refresh:0');
    }

}