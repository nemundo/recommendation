<?php

namespace Hackathon\Setup;

use Hackathon\Application\HackathonApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\App\Script\Type\AbstractScript;
use Nemundo\Blog\Application\BlogApplication;
use Nemundo\Content\App\Base\Collection\ContentAppApplicationCollection;
use Nemundo\Content\App\Feed\Application\FeedApplication;
use Nemundo\Content\App\Job\Application\JobApplication;
use Nemundo\Content\App\TimeSeries\Application\TimeSeriesApplication;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Dev\Script\AdminBuilderScript;
use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\Project\Setup\AbstractSetup;
use Nemundo\Srf\Application\SrfApplication;

class HackathonSetup extends AbstractSetup
{
    public function run()
    {

        (new ProjectInstall())->install();

        $reset = new ProjectReset();
        $reset->reset();

        (new ProjectInstall())->install();
        (new ScriptSetup())->addScript(new AdminBuilderScript());


        (new ContentApplication())->installApp();
        (new JobApplication())->installApp();
        (new TimeSeriesApplication())->installApp();

        (new HackathonApplication())->installApp();
        //(new BlogApplication())->installApp();

        (new SrfApplication())->installApp();

        (new FeedApplication())->installApp();

        //(new ApplicationSetup())->addApplicationCollection(new ContentAppApplicationCollection());

        $reset->remove();

    }
}