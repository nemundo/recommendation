<?php

namespace Nemundo\App\ModelDesigner\Jquery;


use Nemundo\Core\Base\AbstractBase;

class DisableSpaceKeyJquery extends AbstractBase
{

    public function getCode($id)
    {

        $code = '$("#' . $id . '").keypress(function(e) { if(e.which === 32) return false; });';
        return $code;

    }

}