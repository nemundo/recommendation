<?php

namespace Nemundo\Core\Http\Session;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;

class SessionReader extends AbstractDataSource
{


    /**
     * @return Session[]
     */
    public function getData()
    {
        return parent::getData();
    }


    protected function loadData()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();

            (new Debug())->write('Prblembie session reader');
            exit;
            // Pfad muss gesetzt werden!!!

        }

        foreach ($_SESSION as $key => $value) {
            $session = new Session();
            $session->sessionName = $key;
            $this->addItem($session);
        }


    }


}