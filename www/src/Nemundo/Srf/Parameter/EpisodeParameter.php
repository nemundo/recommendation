<?php


namespace Nemundo\Srf\Parameter;


use Nemundo\Srf\Content\Episode\SrfEpisodeContentType;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class EpisodeParameter extends AbstractUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'episode';
    }

    public function getContentType() {

        return (new SrfEpisodeContentType($this->getValue()));

    }

}