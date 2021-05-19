<?php

namespace Nemundo\Content\Index\Tree\Com\Form;

use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;
use Nemundo\Content\Package\ContentJsPackage;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\NemundoJs\NemundoJsPackage;
use Nemundo\Web\WebConfig;


// Two Way possible
// AttachTo


class ContentTreeAttachmentForm extends BootstrapForm
{

    use LibraryTrait;

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var BootstrapListBox
     */
    private $content;

    public function getContent()
    {

        // search box

        $this->addPackage(new NemundoJsPackage());
        $this->addPackage(new ContentJsPackage());
        //$this->addJsUrl(WebConfig::$webUrl.'js/content.js');


        $subtitle=new AdminSubtitle($this);
        $subtitle->content='Attach to ...';


        $row=new BootstrapRow($this);

        $contentTypeListBox = new ContentTypeListBox($row);
        $contentTypeListBox->name='content-type-attachment';


        $this->content= new BootstrapListBox($row);
        $this->content->name = 'content-attachment';
        $this->content->label = 'Content';
        $this->content->validation=true;

        /*$contentReader=new ContentReader();
        $contentReader->addOrder($contentReader->model->subject);
        foreach ($contentReader->getData() as $contentRow) {
            $this->content->addItem($contentRow->id,$contentRow->subject);
        }*/


        return parent::getContent();
    }


    protected function onSubmit()
    {

        $writer = new TreeIndexBuilder();
        $writer->parentId = $this->content->getValue();
        $writer->childId = $this->contentType->getContentId();
        $writer->write();

    }

}