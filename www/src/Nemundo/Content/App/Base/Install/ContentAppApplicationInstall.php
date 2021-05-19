<?php


namespace Nemundo\Content\App\Base\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\App\Bookmark\Application\BookmarkApplication;
use Nemundo\Content\App\Calendar\Application\CalendarApplication;
use Nemundo\Content\App\Camera\Application\CameraApplication;
use Nemundo\Content\App\Contact\Application\ContactApplication;
use Nemundo\Content\App\ContentPrint\Application\ContentPrintApplication;
use Nemundo\Content\App\Dashboard\Application\DashboardApplication;
use Nemundo\Content\App\Explorer\Application\ExplorerApplication;
use Nemundo\Content\App\Favorite\Application\FavoriteApplication;
use Nemundo\Content\App\Feed\Application\FeedApplication;
use Nemundo\Content\App\Feedback\Application\FeedbackApplication;
use Nemundo\Content\App\File\Application\FileApplication;
use Nemundo\Content\App\FileTransfer\Application\FileTransferApplication;
use Nemundo\Content\App\ImageGallery\Application\ImageGalleryApplication;
use Nemundo\Content\App\ImageTimeline\Application\ImageTimelineApplication;
use Nemundo\Content\App\Inbox\Application\InboxApplication;
use Nemundo\Content\App\IssueTracker\Application\IssueTrackerApplication;
use Nemundo\Content\App\Job\Application\JobApplication;
use Nemundo\Content\App\Location\Application\LocationApplication;
use Nemundo\Content\App\Note\Application\NoteApplication;
use Nemundo\Content\App\Notification\Application\NotificationApplication;
use Nemundo\Content\App\PublicShare\Application\PublicShareApplication;
use Nemundo\Content\App\Share\Application\ShareApplication;
use Nemundo\Content\App\Stream\Application\StreamApplication;
use Nemundo\Content\App\Text\Application\TextApplication;
use Nemundo\Content\App\Timeline\Application\TimelineApplication;
use Nemundo\Content\App\TimeSeries\Application\TimeSeriesApplication;
use Nemundo\Content\App\Video\Application\VideoApplication;
use Nemundo\Content\App\Webcam\Application\WebcamApplication;
use Nemundo\Content\App\WebRadio\Application\WebRadioApplication;
use Nemundo\Content\App\Widget\Application\WidgetApplication;


class ContentAppApplicationInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new NotificationApplication())
            ->addApplication(new CalendarApplication())
            ->addApplication(new IssueTrackerApplication())
            ->addApplication(new CameraApplication())
            ->addApplication(new ExplorerApplication())
            ->addApplication(new InboxApplication())
            ->addApplication(new TextApplication())
            ->addApplication(new ContactApplication())
            ->addApplication(new DashboardApplication())
            ->addApplication(new FavoriteApplication())
            ->addApplication(new FeedbackApplication())
            ->addApplication(new BookmarkApplication())
            ->addApplication(new WebcamApplication())
            ->addApplication(new FileApplication())
            ->addApplication(new FileTransferApplication())
            ->addApplication(new ImageGalleryApplication())
            ->addApplication(new JobApplication())
            ->addApplication(new TimelineApplication())
            ->addApplication(new ImageTimelineApplication())
            ->addApplication(new FeedApplication())
            ->addApplication(new LocationApplication())
            ->addApplication(new ContentPrintApplication())
            ->addApplication(new PublicShareApplication())
            ->addApplication(new ShareApplication())
            ->addApplication(new StreamApplication())
            ->addApplication(new NoteApplication())
            ->addApplication(new VideoApplication())
            ->addApplication(new TimeSeriesApplication())
            ->addApplication(new IssueTrackerApplication())
            ->addApplication(new WidgetApplication())
            ->addApplication(new WebRadioApplication());

    }

}