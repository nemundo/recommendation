<?php

namespace Nemundo\Content\Index\Tree\Com\Admin;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Collection\ContentTypeCollection;
use Nemundo\Content\Com\ListBox\ContentTypeCollectionListBox;
use Nemundo\Content\Index\Tree\Base\RestrictedContentTypeTrait;
use Nemundo\Content\Index\Tree\Com\Form\RestrictedContentTypeForm;
use Nemundo\Content\Index\Tree\Data\RestrictedContentType\RestrictedContentTypeDelete;
use Nemundo\Content\Index\Tree\Parameter\RestrictedContentTypeParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Action\Site\DeleteActionSite;

class RestrictedContentTypeCollectionAdmin extends AbstractActionPanel
{

    use RestrictedContentTypeTrait;


    /**
     * @var ContentTypeCollection
     */
    public $contentTypeCollection;

    //public $contentTypeId;

    /**
     * @var ActionSite
     */
    private $index;

    /**
     * @var DeleteActionSite
     */
    private $delete;


    public function __construct(AbstractContainer $parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->contentTypeCollection = new ContentTypeCollection();

    }


    protected function loadActionSite()
    {


        $this->index = new ActionSite($this);
        $this->index->onAction = function () {

            $layout = new BootstrapTwoColumnLayout($this);

            $form = new SearchForm($layout->col1);

            $contentTypeListBox = new ContentTypeCollectionListBox($form);
            $contentTypeListBox->contentTypeCollection = $this->contentTypeCollection;
            $contentTypeListBox->submitOnChange = true;
            $contentTypeListBox->searchMode = true;
            //$contentTypeListBox->emptyValueAsDefault=false;

            if ($contentTypeListBox->hasValue()) {


                $this->contentTypeId = $contentTypeListBox->getValue();

                $table = new AdminTable($layout->col2);

                $row = new AdminTableHeader($table);
                $row->addText('Restricted Content Type');
                $row->addEmpty();

                foreach ($this->getRestrictedContentTypeData() as $restrictedContentTypeRow) {

                    $row = new TableRow($table);
                    $row->addText($restrictedContentTypeRow->restrictedContentType->contentType);

                    $site = clone($this->delete);
                    $site->addParameter(new RestrictedContentTypeParameter($restrictedContentTypeRow->id));
                    $row->addIconSite($site);

                }

                $widget = new AdminWidget($layout->col2);
                $widget->widgetTitle = 'Add Content Type';

                $form = new RestrictedContentTypeForm($widget);
                $form->contentTypeId = $contentTypeListBox->getValue();


            }

        };


        $this->delete = new DeleteActionSite($this);
        $this->delete->onAction = function () {

            (new RestrictedContentTypeDelete())->deleteById((new RestrictedContentTypeParameter())->getValue());
            (new UrlReferer())->redirect();

        };

    }

}