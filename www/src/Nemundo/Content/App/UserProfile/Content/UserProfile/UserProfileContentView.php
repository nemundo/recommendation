<?php

namespace Nemundo\Content\App\UserProfile\Content\UserProfile;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\View\AbstractContentView;

class UserProfileContentView extends AbstractContentView
{
    /**
     * @var UserProfileContentType
     */
    public $contentType;
    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }
    public function getContent()
    {


        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Name', $this->contentType->getDataRow()->lastName);
        $table->addLabelValue('Name', $this->contentType->getDataRow()->user->login);

        $table->addLabelValue('Data Id', $this->contentType->getDataId());
        $table->addLabelValue('Content Id', $this->contentType->getContentId());
        $table->addLabelValue('Group Id', $this->contentType->getGroupId());


        return parent::getContent();
    }
}