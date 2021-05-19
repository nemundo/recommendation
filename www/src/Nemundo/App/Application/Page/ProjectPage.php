<?php

namespace Nemundo\App\Application\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminClickableTableRow;
use Nemundo\App\Application\Data\Project\ProjectReader;
use Nemundo\App\Application\Template\ApplicationTemplate;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Core\Local\LocalCommand;
use Nemundo\Core\Path\Path;

class ProjectPage extends ApplicationTemplate
{
    public function getContent()
    {

        $table = new AdminTable($this);

        $reader = new ProjectReader();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->project->label);
        $header->addText('Path');
        $header->addText('Web Class');
        $header->addText('Setup Class');
        $header->addText('Version');

        foreach ($reader->getData() as $projectRow) {

            $row = new AdminClickableTableRow($table);
            $row->addText($projectRow->project);

            $project = $projectRow->getProject();

            $row->addText($project->path);
            $row->addText($project->webLoadClass);
            $row->addText($project->setupClass);

            $projectPath = (new Path())
                ->addPath($project->path)
                ->addParentPath()
                ->getPath();

            $row->addText($projectPath);

            /*
            $cmd = new LocalCommand();
            $value = $cmd->runLocalCommand('cd ' . $projectPath . ' && git for-each-ref --sort=creatordate --format "%(refname) %(objectname)" refs/tags');

            $ul = new UnorderedList($row);
            foreach ($value as $version) {
                $ul->addText($version);
            }*/

        }

        return parent::getContent();

    }

}