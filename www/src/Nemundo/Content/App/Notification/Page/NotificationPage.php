<?php

namespace Nemundo\Content\App\Notification\Page;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\App\Notification\Data\Notification\NotificationPaginationReader;
use Nemundo\Content\App\Notification\Site\Action\UserNotificationDeleteSite;
use Nemundo\Content\App\Notification\Template\NotificationTemplate;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Site\ContentViewSite;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\User\Session\UserSession;

class NotificationPage extends NotificationTemplate
{


    public function getContent()
    {


        // alle löschen
        // unique


        $layout = new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $notificationReader = new NotificationPaginationReader();
        $notificationReader->model->loadContent();
        $notificationReader->model->content->loadContentType();
        $notificationReader->filter->andEqual($notificationReader->model->userId, (new UserSession())->userId);
        $notificationReader->addOrder($notificationReader->model->id, SortOrder::DESCENDING);


        $row = new AdminTableHeader($table);
        $row->addText('Notification');
        $row->addText('Date/Time');


        foreach ($notificationReader->getData() as $notificationRow) {


            $row = new AdminClickableTableRow($table);
            //$row->addText($notificationRow->content->id);
            $row->addText($notificationRow->content->subject);
            $row->addText($notificationRow->dateTime->getShortDateTimeLeadingZeroFormat());


            $contentType = $notificationRow->content->getContentType();

            if ($contentType!==null) {

            if ($contentType->hasViewSite()) {

                $site = $notificationRow->content->getContentType()->getSubjectViewSite();
                $row->addSite($site);

            } else {

                //$site=clone
                $site = clone(ContentViewSite::$site);
                $site->addParameter(new ContentParameter($contentType->getContentId()));
$row->addClickableSite($site);

            }

            }


        }


        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $notificationReader;

        // delete


        $btn=new AdminIconSiteButton($this);
        $btn->site=UserNotificationDeleteSite::$site;


        return parent::getContent();
    }
}