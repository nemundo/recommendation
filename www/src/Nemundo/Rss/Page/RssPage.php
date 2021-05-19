<?php


namespace Nemundo\Rss\Page;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Crawler\HtmlParser\HtmlParser;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Rss\Reader\RssReader;


class RssPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $input = new BootstrapTextBox($formRow);
        $input->name = 'url';
        $input->label = 'Rss Url';
        $input->searchMode = true;

        new AdminSearchButton($formRow);


        if ($input->hasValue()) {

            $rssReader = new RssReader();
            $rssReader->feedUrl= $input->getValue();


            $table=new AdminLabelValueTable($this);
            $table->addLabelValue('Title',$rssReader->getTitle());
            $table->addLabelValue('Description',$rssReader->getDescription());
            $table->addLabelValue('Image Url',$rssReader->getImageUrl());


            $table = new AdminTable($this);

            $header = new TableHeader($table);
            $header->addText('Title');
            $header->addText('Description');
            $header->addText('Date/Time');
            $header->addText('Url');
            $header->addText('Enclosure Url');
            $header->addText('Enclosure Type');

            foreach ($rssReader->getData() as $rssItem) {

                $row=new TableRow($table);
                $row->addText($rssItem->title);
                $row->addText($rssItem->description);
                $row->addText($rssItem->dateTime->getIsoDateTime());
                $row->addHyperlink($rssItem->url);
                $row->addHyperlink($rssItem->enclosureUrl);
                $row->addText($rssItem->enclosureType);

            }

        }

        return parent::getContent();

    }

}