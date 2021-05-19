<?php

namespace Nemundo\Content\Com\Admin;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Collection\ContentTypeCollection;
use Nemundo\Content\Com\Form\ContentTypeCollectionAddForm;
use Nemundo\Content\Data\ContentTypeCollectionContentType\ContentTypeCollectionContentTypeDelete;
use Nemundo\Content\Data\ContentTypeCollectionContentType\ContentTypeCollectionContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Action\Site\DeleteActionSite;

class ContentTypeCollectionAdmin extends AbstractActionPanel
{

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


            $form = new ContentTypeCollectionAddForm($this);
            $form->collectionId = $this->contentTypeCollection->collectionId;


            $reader = new ContentTypeCollectionContentTypeReader();
            $reader->model->loadContentType();
            $reader->filter->andEqual($reader->model->collectionId, $this->contentTypeCollection->collectionId);

            $table = new AdminTable($this);

            $row = new AdminTableHeader($table);
            $row->addText('Content Type');
            $row->addEmpty();

            foreach ($reader->getData() as $contentTypeRow) {

                $row = new TableRow($table);
                $row->addText($contentTypeRow->contentType->contentType);

                $site = clone($this->delete);
                $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
                $row->addIconSite($site);

            }

        };


        $this->delete = new DeleteActionSite($this);
        $this->delete->onAction = function () {

            (new ContentTypeCollectionContentTypeDelete())->deleteById((new ContentTypeParameter())->getValue());
            (new UrlReferer())->redirect();

        };

    }

}