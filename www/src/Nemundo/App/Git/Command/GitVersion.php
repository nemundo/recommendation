<?php


namespace Nemundo\App\Git\Command;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Local\LocalCommand;

class GitVersion extends AbstractBase
{

    public function getVersion() {

        $version=(new LocalCommand())->runLocalCommand('git --version')[0];
        return $version;

    }

}