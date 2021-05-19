<?php


namespace Nemundo\Content\Page\Admin;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\App\Application\Com\ListBox\ApplicationListBox;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentModel;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\Admin\AllContentRemoveSite;
use Nemundo\Content\Site\ContentDeleteSite;
use Nemundo\Content\Site\ContentEditSite;
use Nemundo\Content\Site\ContentViewSite;
use Nemundo\Content\Site\Json\JsonExportSite;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;


class ContentAdminPage extends ContentAdminTemplate
{

    public function getContent()
    {

        $form = new SearchForm($this);

        $formRow = new BootstrapRow($form);

        $application = new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;
        $application->column = true;
        $application->columnSize = 1;

        $listbox = new ContentTypeListBox($formRow);

        if ($application->hasValue()) {
        $listbox->applicationId = $application->getValue();
        }

        $listbox->submitOnChange = true;
        $listbox->searchMode = true;
        $listbox->column = true;
        $listbox->columnSize = 1;

        $contentIdTextBox = new BootstrapTextBox($formRow);
        $contentIdTextBox->label = 'Content Id';
        $contentIdTextBox->searchMode = true;
        $contentIdTextBox->column = true;
        $contentIdTextBox->columnSize = 1;

        $dataIdTextBox = new BootstrapTextBox($formRow);
        $dataIdTextBox->label = 'Data Id';
        $dataIdTextBox->searchMode = true;
        $dataIdTextBox->column = true;
        $dataIdTextBox->columnSize = 1;

        /*
        $user = new UserListBox($formRow);
        $user->submitOnChange = true;
        $user->searchMode = true;
*/



        $subject = new BootstrapTextBox($formRow);
        $subject->label = 'Subject';
        $subject->searchMode = true;
        $subject->column = true;
        $subject->columnSize = 1;


        new AdminSearchButton($formRow);


        /*
        $reader = new ContentTypeReader();
        foreach ($reader->getData() as $contentTypeRow) {
            $listbox->addItem($contentTypeRow->id, $contentTypeRow->phpClass);
        }*/


        //$btn = new AdminSiteButton($this);
        //$btn->site = ContentNewSite::$site;




                $contentReader = new ContentPaginationReader();
                $contentReader->model->loadContentType();
                $contentReader->model->contentType->loadApplication();
                //$contentReader->model->loadUser();

                $filter = new Filter();
                $model = new ContentModel();

                if ($application->hasValue()) {
                    $filter->andEqual($contentReader->model->contentType->applicationId, $application->getValue());
                }

                $contentTypeParameter = new ContentTypeParameter();
                $contentTypeParameter->contentTypeCheck = false;
                if ($contentTypeParameter->hasValue()) {


                    /*$btn = new AdminSiteButton($this);
                    $btn->site = clone(AllContentRemoveSite::$site);
                    $btn->site->addParameter($contentTypeParameter);*/


                   $filter->andEqual($model->contentTypeId, $contentTypeParameter->getValue());

                    $contentType = $contentTypeParameter->getContentType();

                    $table = new AdminLabelValueTable($this);
                    $table->addLabelValue('Class', $contentType->getClassName());
                    $table->addLabelValue('Type Label', $contentType->typeLabel);
                    $table->addLabelValue('Type Id', $contentType->typeId);

                    /*$btn = new AdminSiteButton($this);
                    $btn->site = clone(RemoveContentSite::$site);
                    $btn->site->addParameter($contentTypeParameter);*/

            }

              if ($contentIdTextBox->hasValue()) {
                  $filter->andEqual($model->id, $contentIdTextBox->getValue());
              }

              if ($dataIdTextBox->hasValue()) {
                  $filter->andEqual($model->dataId, $dataIdTextBox->getValue());
              }

              //if ($user->hasValue()) {
              //    $filter->andEqual($model->userId, $user->getValue());
              //}

              if ($subject->hasValue()) {
                  $filter->andEqual($model->subject, $subject->getValue());
              }

              $count = new ContentCount();
              $count->model->loadContentType();
              $count->filter = $filter;
              $contentCount = $count->getCount();

              $p = new Paragraph($this);
              $p->content = (new Number($contentCount))->formatNumber() . ' Content found';

              $contentReader->filter = $filter;
              $contentReader->addOrder($contentReader->model->id, SortOrder::DESCENDING);
              $contentReader->paginationLimit = 50;

              $table = new AdminClickableTable($this);

              $header = new TableHeader($table);
              $header->addText($contentReader->model->contentType->application->label);
              $header->addText($contentReader->model->id->label);
              $header->addText($contentReader->model->dataId->label);
              $header->addText('Type');
              $header->addText('Type Id');
              $header->addText('Subject (Data)');
              $header->addText('Class');
              $header->addText('Subject (Type)');
              //$header->addText('Date/Time');
              //$header->addText('User');
              $header->addEmpty();
              $header->addEmpty();

              foreach ($contentReader->getData() as $contentRow) {

                  $contentType = $contentRow->getContentType();

                  $row = new BootstrapClickableTableRow($table);
                  $row->addText($contentRow->contentType->application->application);

                  $row->addText($contentRow->id);
                  $row->addText($contentRow->dataId);
                  $row->addText($contentRow->contentType->contentType);
                  $row->addText($contentRow->contentTypeId);
                  $row->addText($contentRow->subject);

                  if ($contentType !== null) {
                      $row->addText($contentType->getClassName());
                      $row->addText($contentType->getSubject());
                  }


                  //$row->addText($contentRow->dateTime->getShortDateTimeWithSecondLeadingZeroFormat());
                  //$row->addText($contentRow->user->login);

                  /*
                  if ($contentType->isObjectOfTrait(JsonContentTrait::class)) {
                      $site = clone(ContentJsonSite::$site);
                      $site->addParameter(new ContentParameter($contentRow->id));
                      $row->addSite($site);
                  } else {
                      $row->addEmpty();
                  }*/





            $site = clone(JsonExportSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addSite($site);

            $site = clone(ContentEditSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addIconSite($site);

            $site = clone(ContentDeleteSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addIconSite($site);

            $site = clone(ContentViewSite::$site);  // ContentItemSite::$site);
            $site->addParameter(new ContentParameter($contentRow->id));
            $row->addClickableSite($site);


                }


                $pagination = new BootstrapPagination($this);
                $pagination->paginationReader = $contentReader;


                /*
                $form = new SearchForm($this);

                $formRow = new BootstrapRow($form);

                $applicationListBox = new ApplicationListBox($formRow);
                $applicationListBox->searchMode = true;
                $applicationListBox->submitOnChange = true;
                $applicationListBox->column = true;
                $applicationListBox->columnSize = 2;

                $contentTypeListBox = new ViewContentTypeListBox($formRow);  // new ContentTypeListBox($formRow);
                $contentTypeListBox->searchMode = true;
                $contentTypeListBox->submitOnChange = true;
                $contentTypeListBox->column = true;
                $contentTypeListBox->columnSize = 2;

                if ($applicationListBox->hasValue()) {
                    $contentTypeListBox->applicationId=$applicationListBox->getValue();
                }

                $contentTypeParameter = new ContentTypeParameter();
                if ($contentTypeParameter->hasValue()) {

                    $contentType = $contentTypeParameter->getContentType();

                    $layout = new BootstrapThreeColumnLayout($this);
                    $layout->col1->columnWidth= 4;
                    $layout->col2->columnWidth= 6;
                    $layout->col3->columnWidth= 2;




                    if ($contentType->hasList()) {

                        $contentTypeListBox = $contentType->getListing($layout->col1);

                        $contentTypeListBox->redirectSite =ContentAdminSite::$site;
                        $contentTypeListBox->redirectSite->addParameter(new ContentTypeParameter());

                    }


                    $contentParameter = new ContentParameter();
                    if ($contentParameter->hasValue()) {


                        $btn=new AdminSiteButton($layout->col2);
                        $btn->site = clone(ContentAdminSite::$site);
                        $btn->site->addParameter(new ContentTypeParameter());
                        $btn->site->title='New';


                        $content = $contentParameter->getContent(false);
                        if ($content->hasView()) {
                            //$content->getDefaultView($layout->col2);

                            $widget = new ContentWidget($layout->col2);
                            $widget->contentType = $content;
                            $widget->loadAction = true;
                            $widget->redirectSite = ContentAdminSite::$site;

                            /*
                            $container = new TreeIndexContainer($layout->col3);
                            $container->contentType = $content;
                            $container->redirectSite = ContentAdminSite::$site;*/
        /*
                        }

                    } else {

                        if ($contentType->hasForm()) {

                            $widget = new AdminWidget($layout->col2);
                            $widget->widgetTitle = 'New';

                            $form = $contentType->getDefaultForm($widget);
                            $form->redirectSite = clone(ContentAdminSite::$site);
                            $form->redirectSite->addParameter(new ContentTypeParameter());
                            //$list->redirectSite = ExplorerSite::$site;
                        }


                    }


                }*/


        return parent::getContent();

    }

}