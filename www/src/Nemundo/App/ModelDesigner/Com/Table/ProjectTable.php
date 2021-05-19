<?php

namespace Nemundo\App\ModelDesigner\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\ModelDesigner\ModelDesignerConfig;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\ProjectSite;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ProjectTable extends AdminClickableTable
{

    public function getContent()
    {

        $header = new AdminTableHeader($this);
        $header->addText('Project');
        $header->addText('Project Name');
        $header->addText('Model Path');
        $header->addText('Namespace');
        $header->addEmpty();

        foreach ((new ModelDesignerConfig())->getProjectCollection()->getProjectList() as $project) {

            $row = new BootstrapClickableTableRow($this);
            $row->addText($project->project);
            $row->addText($project->projectName);
            $row->addText($project->modelPath);

            $row->addText($project->namespace);

            $site = clone(ProjectSite::$site);
            $site->addParameter(new ProjectParameter($project->projectName));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}