<?php

namespace Nemundo\Content\App\Contact\Parameter;

use Nemundo\Content\App\Contact\Content\Contact\ContactContentType;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ContactParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'contact';
    }


    public function getContentType() {

        $contactContentType=new ContactContentType($this->getValue());
        return $contactContentType;

    }


}