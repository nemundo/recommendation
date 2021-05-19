<?php

namespace Nemundo\Core\Http\Cookie;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

class CookieReader extends AbstractDataSource
{


    /**
     * @return Cookie[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        foreach ($_COOKIE as $key => $value) {
            $cookie = new Cookie();
            $cookie->cookieName = $key;
            $this->addItem($cookie);
        }


    }


}