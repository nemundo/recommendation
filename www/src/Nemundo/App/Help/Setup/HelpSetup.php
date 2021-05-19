<?php

namespace Nemundo\App\Help\Setup;


use Nemundo\App\Help\Data\Code\Code;
use Nemundo\App\Help\Data\Project\Project;
use Nemundo\App\Help\Data\Project\ProjectId;
use Nemundo\App\Help\Data\Topic\Topic;
use Nemundo\App\Help\Data\Topic\TopicDelete;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\DirectoryReader;
use Nemundo\Core\Path\Path;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\Type\Text\Text;
use Nemundo\FrameworkProject;
use Nemundo\Project\AbstractProject;

class HelpSetup extends AbstractBase
{

    public function addProject(AbstractProject $project)
    {

        $data = new Project();
        $data->updateOnDuplicate = true;
        $data->project = $project->project;
        $data->phpClass = $project->getClassName();
        $data->save();

        $id = new ProjectId();
        $id->filter->andEqual($id->model->phpClass, $project->getClassName());
        $projectId = $id->getId();


        $reader = new DirectoryReader();
        $reader->includeDirectories = true;
        $reader->includeFiles = true;
        $reader->recursiveSearch = true;
        $reader->path = (new Path())
            ->addPath((new FrameworkProject())->path)
            ->addPath('..')
            ->addPath('test')
            //  ->addPath($helpParameter->getValue())
            ->getPath();


        $delete=new TopicDelete();
        $delete->filter->andEqual($delete->model->projectId,$projectId);
        $delete->delete();


        $topicId=null;

        foreach ($reader->getData() as $file) {


            if ($file->isDirectory()) {
                //(new Debug())->write($file->fullFilename);
                //(new Debug())->write($file->filename);

                //$list->addText($file->filename);

                $data=new Topic();
                $data->projectId=$projectId;
                $data->topic=$file->filename;
                $topicId=$data->save();

            }



            if ($file->isFile()) {

                $textFile = new TextFileReader($file->fullFilename);

                $content = new Text($textFile->getText());
                $content->replace('<?php', '')->trim();
                //$content->replace('require \'../../config.php\';', '');
                $content
                    ->removeRegex('require \'.*?config.php\';')
                    ->trim();

                $data = new Code();
                $data->topicId = $topicId;
                $data->title = $file->getFilenameWithoutExtension();
                $data->code = $content->getValue();
                $data->save();


            }


                /*
                $h4 = new H1($help);
                $h4->content = $file->getFilenameWithoutExtension();

                $textFile = new TextFileReader($file->fullFilename);

                //$code = new Code($colRight);
                //$code->content = (new Html($file->getContent()))->getValue();

                //$file->getContent();  //  $textFile->getText();


                $content = new Text($file->getContent());
                $content->replace('<?php', '')->trim();
                //$content->replace('require \'../../config.php\';', '');
                $content->removeRegex('require \'.*?config.php\';');

                $html = $content->getValue();
//$html = (new Html( $content->trim()->getValue()))->getValue();

                //$code = new Code($help);
                //$code->content = $html;

                $code = new HighlightJs($help);
                $code->language = 'php';
                $code->code =$html;



                $link = new UrlHyperlink($help);
                $link->content = 'Run';
                $link->url = (new Text(WebConfig::$webUrl))->replace('/web', '')->getValue() . (new Text($file->fullFilename))->replace(ProjectConfig::$projectPath, '')->getValue();
                $link->openNewWindow = true;
            */


        }

        return $this;

    }

}