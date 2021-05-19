<?php

namespace Nemundo\Package\Bootstrap\Pagination;


use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Structure\ForLoop;
use Nemundo\Html\Hyperlink\Hyperlink;
use Nemundo\Html\Layout\Nav;
use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\Ul;
use Nemundo\Web\Site\Site;
use Nemundo\Web\Url\UrlBuilder;

// SitePagination
abstract class AbstractBootstrapPagination extends Nav
{

    /**
     * @var bool
     */
    public $showPreviousNext = true;

    /**
     * @var bool
     */
    public $showNumber = true;

    protected $totalCount;

    protected $paginationLimit = 50;


    public function getCurrentPage()
    {

        return (new PageParameter())->getValue();

    }


    protected function getPaginationFrom()
    {
        return 0;
    }


    protected function getPaginationTo()
    {
        return 10;
    }


    public function getContent()
    {


        /*(new Debug())->write($this->totalCount);
        (new Debug())->write($this->paginationLimit);*/

        $currentPage = (new PageParameter())->getValue();

        if ($this->totalCount <= $this->paginationLimit) {
            $this->visible = false;
        }

        $list = new Ul($this);
        $list->addCssClass('pagination');

        if ($this->showPreviousNext) {

            $li = new Li($list);
            $li->addCssClass('page-item');

            // Previous
            $hyperlink = new Hyperlink($li);
            $hyperlink->addCssClass('page-link');
            $hyperlink->content = 'Zurück';
            //$hyperlink->href = (new Site())->addParameter(new PageParameter($currentPage - 1))->getUrl();

            if ($this->getCurrentPage()> 0) {
                $hyperlink->href = (new Site())->addParameter(new PageParameter($currentPage - 1))->getUrl();
            } else {
                $li->addCssClass('disabled');
            }

        }


        if ($this->showNumber) {

            $loop = new ForLoop();
            $loop->minNumber = $this->getPaginationFrom();
            $loop->maxNumber = $this->getPaginationTo();

            foreach ($loop->getData() as $number) {

                $li = new Li($list);
                $li->addCssClass('page-item');

                if ($this->getCurrentPage() == $number) {
                    $li->addCssClass('active');
                }

                $hyperlink = new Hyperlink($li);
                $hyperlink->addCssClass('page-link');
                $hyperlink->content = $number + 1;

                $parameter = new PageParameter($number);

                $url = new UrlBuilder();
                $url->addParameter($parameter);

                $hyperlink->href = $url->getUrl();

            }
        }

        if ($this->showPreviousNext) {

            $li = new Li($list);
            $li->addCssClass('page-item');

            $hyperlink = new Hyperlink($li);
            $hyperlink->addCssClass('page-link');
            $hyperlink->content = 'Weiter';
            $hyperlink->href = (new Site())->addParameter(new PageParameter($currentPage + 1))->getUrl();

            if ((($this->getCurrentPage() + 1) * $this->paginationLimit) > $this->totalCount) {
                $li->addCssClass('disabled');
            }

        }

        return parent::getContent();

    }

}