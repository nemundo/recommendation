<?php
namespace Nemundo\Content\App\File\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class FileTransferParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'filetransfer';
}
}