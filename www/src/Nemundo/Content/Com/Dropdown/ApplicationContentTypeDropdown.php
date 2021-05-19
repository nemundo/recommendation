<?php


namespace Nemundo\Content\Com\Dropdown;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ApplicationContentTypeDropdown extends BootstrapSiteDropdown
{

    /**
     * @var AbstractApplication
     */
    public $application;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function getContent()
    {

        $reader = new ApplicationContentTypeReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->applicationId, $this->application->applicationId);
        $reader->addOrder($reader->model->contentType->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $site = new Site();
            $site->title = $contentTypeRow->contentType->contentType;
            $site->addParameter((new ContentTypeParameter($contentTypeRow->contentTypeId)));
            $this->addSite($site);

        }

        return parent::getContent();

    }

}