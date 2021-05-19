<?php

namespace Nemundo\App\FileLog\Parameter;

use Nemundo\Project\Path\LogPath;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class FilenameParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'filename';
    }


    public function getFullFilename()
    {

        return (new LogPath())
            ->addPath($this->getValue())
            ->getFullFilename();

    }

}