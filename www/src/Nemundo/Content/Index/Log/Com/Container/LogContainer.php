<?php


namespace Nemundo\Content\Index\Log\Com\Container;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Geo\Data\Distance\DistanceReader;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Index\Log\Data\Log\LogReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Geo\Map\GoogleMaps\GoogleMapsHyperlink;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class LogContainer extends AbstractContentTypeContainer
{

    public function getContent()
    {



        /** $contentType GeoIndexTrait */
        //if ($this->contentType->isObjectOfTrait(GeoIndexTrait::class)) {

            //$subtitle = new AdminSubtitle($layout->col2);
            //$subtitle->content = 'Geo';

            $widget=new AdminWidget($this);
            $widget->widgetTitle='Log';


            $table = new AdminClickableTable($widget);

            $header = new TableHeader($table);
           $header->addText('Log');
            $header->addText('User');
            $header->addText('Date/Time');

            $logReader = new LogReader();
        $logReader->model->loadContentLog();
        $logReader->model->contentLog->loadContentType();
            $logReader->model->loadUser();
            $logReader->filter->andEqual($logReader->model->contentItemId, $this->contentType->getContentId());
            $logReader->addOrder($logReader->model->dateTime);

            foreach ($logReader->getData() as $logRow) {
                $row = new BootstrapClickableTableRow($table);

                //$row->addText('Item was Created');

                $row->addText($logRow->contentLog->getContentType()->getSubject());

                $row->addText($logRow->user->displayName);
                $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());
            }

        //}

        return parent::getContent();

    }


}