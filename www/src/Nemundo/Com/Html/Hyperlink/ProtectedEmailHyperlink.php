<?php

namespace Nemundo\Com\Html\Hyperlink;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Html\Script\JavaScript;

class ProtectedEmailHyperlink extends AbstractHyperlink
{

    use LibraryTrait;

    /**
     * @var string
     */
    public $email;


    public function getContent()
    {

        $email = new Text($this->email);
        $emailList = $email->split('@');

       /* $this->addJavaScript('function getMail() {');
        $this->addJavaScript('address1 = "' . $emailList[0] . '";');
        $this->addJavaScript('address2 = "' . $emailList[1] . '";');
        $this->addJavaScript('return address1 + "@" + address2;');
        $this->addJavaScript('}');*/

        $script = new JavaScript($this);
        $script->addCodeLine('function getMail() {');
        $script->addCodeLine('address1 = "' . $emailList[0] . '";');
        $script->addCodeLine('address2 = "' . $emailList[1] . '";');
        $script->addCodeLine('return address1 + "@" + address2;');
        $script->addCodeLine('}');
        //$script->addCodeLine('document.write(getMail());');
        //$this->addHtml($script->getHtml());

        $this->content = '<script>document.write(getMail());</script>';

        $this->href = '#';
        $this->addAttribute('onclick', 'javascript:window.location=\'mailto:\' + getMail()');

        return parent::getContent();

    }

}