<?php
namespace Nemundo\App\Mail\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class MailServerParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'mailserver';
}
}