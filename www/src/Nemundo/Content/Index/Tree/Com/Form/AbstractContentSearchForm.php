<?php


namespace Nemundo\Content\Index\Tree\Com\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Content\Form\ContentFormTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\EventTrait;


// AbstractTreeContentForm
abstract class AbstractContentSearchForm extends AbstractAdminForm
{

    use EventTrait;

    use ContentFormTrait;


    /**
     * @var AbstractTreeContentType
     */
    /*public $contentType;*/

    public $formName = 'Search';


    public function getContent()
    {

        $this->submitButton->label = 'Add';

        return parent::getContent();

    }


    protected function saveTree(AbstractContentType $contentType)
    {

        //if ($this->contentType->hasParent()) {

        /*
        $writer = new TreeWriter();
        $writer->parentId = $this->contentType->getParentId();
        $writer->childId = $contentType->getContentId();
        $writer->write();
*/


        foreach ($this->contentType->getEventList() as $event) {
            $event->onCreate($contentType);
        }

        //}


    }


}