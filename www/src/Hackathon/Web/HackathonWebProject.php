<?php


namespace Hackathon\Web;


use Nemundo\Project\Web\AbstractWebProject;

class HackathonWebProject extends AbstractWebProject
{

    protected function loadWeb()
    {
        $this->webPath = 'web';
    }

}