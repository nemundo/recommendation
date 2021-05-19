<?php

namespace Nemundo\Content\App\Podcast\Parameter;

use Nemundo\Content\App\Podcast\Content\Episode\EpisodeContentType;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class EpisodeParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'episode';
    }


    public function getEpisodeContent() {


        return (new EpisodeContentType($this->getValue()));


    }


}