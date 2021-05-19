<?php


namespace Nemundo\Srf\Config;


use Nemundo\Core\Base\AbstractBase;

class BusinessUnit extends AbstractBase
{

    const SRF = 'srf';

    const RTS = 'rts';

    const RSI = 'rsi';

    const RTR = 'rtr';

    const SWI = 'swi';


    public function getList()
    {

        $list = [];
        $list[] = 'srf';
        $list[] = 'rts';
        $list[] = 'rsi';
        $list[] = 'rtr';

        return $list;

    }

}