<?php
namespace Nemundo\Content\App\WebCrawler\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class DomainParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'domain';
}
}