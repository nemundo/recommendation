<?php

namespace Nemundo\Web\Url;


use Nemundo\Core\Base\AbstractBase;

class JavaScriptUrlRedirect extends AbstractBase
{

    public function redirectAsJavaScript($url)
    {

        echo '<script>window.open("' . $url . '", "_blank");</script>';
        exit;

    }

}