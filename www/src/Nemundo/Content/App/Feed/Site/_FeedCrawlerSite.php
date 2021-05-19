<?php


namespace Nemundo\Content\App\Feed\Site;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentForm;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Content\Item\FeedItemContentType;
use Nemundo\Content\App\Feed\Data\Feed\FeedReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemPaginationReader;
use Nemundo\Content\App\Feed\Data\FeedItem\FeedItemReader;
use Nemundo\Content\Config\ProcessConfig;
use Nemundo\Rss\RssReader;
use Nemundo\Web\Site\AbstractSite;

class FeedCrawlerSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title='Feed Crawler';
        $this->url='feed-crawler';

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();



        $form=new SearchForm($page);

        $formRow=new BootstrapRow($form);

        $feedInput=new BootstrapTextBox($formRow);
        $feedInput->label='Feed Url';

    new AdminSearchButton($formRow);


        if ($feedInput->hasValue()) {

            $table=new AdminTable($page);

            $rssReader=new RssReader();
            $rssReader->feedUrl=$feedInput->getValue();
            foreach ($rssReader->getData() as $rssItem) {

                $row=new TableRow($table);
                $row->addText($rssItem->title);
                $row->addText($rssItem->description);

                $input=new TextInput($row);
                $input->value=$rssItem->enclosureUrl;

            }

        }

        $page->render();

    }

}