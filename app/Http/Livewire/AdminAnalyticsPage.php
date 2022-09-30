<?php

namespace App\Http\Livewire;

use App\Models\ChurchFileLink;
use App\Models\ChurchMediaLinkDownload;
use App\Models\ChurchMediaLinkShare;
use App\Models\ChurchMediaLinkView;
use App\Models\ChurchMemberFileLink;
use App\Models\Comment;
use App\Models\Guest;
use App\Models\Media;
use App\Models\MediaLinkDownload;
use App\Models\MediaLinkShare;
use App\Models\MediaLinkView;
use App\Models\MediaTranslation;
use App\Models\Member;
use App\Models\NonMember;
use App\Models\NonMemberFileLink;
use App\Models\NonMemberMediaLinkDownload;
use App\Models\NonMemberMediaLinkShare;
use App\Models\NonMemberMediaLinkView;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminAnalyticsPage extends Component
{
    public $medias;
    public $churchLinks;
    public $memberLinks;
    public $missionaryLinks;
    public $totalLinks;

    public $members;
    public $translations;
    public $missionaries;

    public $churches;

    public $views;
    public $shares;
    public $likes;
    public $downloads = 0;
    public $comments = 0;

    public function mount()
    {
        $this->fetchCounts();
        $this->fetchStat();
    }

    public function fetchStat()
    {
        //Calculate Views
        $this->views = $this->churchViews() + $this->memberViews() + $this->nonMemberViews();

        //Calculate Shares
        $this->shares = $this->churchShares() + $this->memberShares() + $this->nonMemberShares();

        //Calculate Likes
        $medias = Media::all();
        foreach ($medias as $media) {
             $this->likes = $media->likes;
        }

        $this->comments = Comment::where('id', '!=', '')->count();

        //Calculate Downloads
        $this->downloads = $this->churchDownloads() + $this->memberDownloads() + $this->nonMemberDownloads();
    }

    // Shares
    public function churchShares(){
        $count = 0;
        $shares = ChurchMediaLinkShare::all();
        foreach ($shares as $share) {
            $count += $share->count;
        }
        return $count;
    }

    public function memberShares(){
        $count = 0;
        $shares = MediaLinkShare::all();
        foreach ($shares as $share) {
            $count += $share->count;
        }
        return $count;
    }

    public function nonMemberShares(){
        $count = 0;
        $shares = NonMemberMediaLinkShare::all();
        foreach ($shares as $share) {
            $count += $share->count;
        }
        return $count;
    }


    // Downloads
    public function churchDownloads(){
        $counts = 0;
        $downloads = ChurchMediaLinkDownload::all();
        foreach ($downloads as $download) {
            $counts += $download->count;
        }
        return $counts;
    }
    public function memberDownloads(){
        $counts = 0;
        $downloads = MediaLinkDownload::all();
        foreach ($downloads as $download) {
            $counts += $download->count;
        }
        return $counts;
    }
    public function nonMemberDownloads(){
        $counts = 0;
        $downloads = NonMemberMediaLinkDownload::all();
        foreach ($downloads as $download) {
            $counts += $download->count;
        }
        return $counts;
    }

    //Views
    public function churchViews(){
        return ChurchMediaLinkView::where('id', '!=', '')->count();
    }
    public function memberViews(){
        return MediaLinkView::where('id', '!=', '')->count();
    }
    public function nonMemberViews(){
        return NonMemberMediaLinkView::where('id', '!=', '')->count();
    }

    public function fetchCounts()
    {
        $this->medias = Media::where('id', '!=', '')->count();
        $this->churchLinks = ChurchFileLink::where('id', '!=', '')->count();
        $this->memberLinks = ChurchMemberFileLink::where('id', '!=', '')->count();
        $this->missionaryLinks = NonMemberFileLink::where('id', '!=', '')->count();
        $this->members  = Member::where('id', '!=', '')->count();
        $this->translations = MediaTranslation::where('id', '!=', '')->count();
        $this->missionaries = NonMember::where('id', '!=', '')->count();
        $this->churches = User::where('id', '!=', '')->get();

        //Total ShareLinks
        $this->totalLinks = $this->churchLinks + $this->memberLinks + $this->missionaryLinks;

    }

    public function computeStat()
    {
        $analytics =  array([
            'Views' => $this->views,
            'Shares' => $this->shares,
            'Likes' => $this->likes,
            'Downloads' => $this->downloads,
            'Comments' => $this->comments
        ]);

        // $list = User::all()->toArray();
        return $this->downloadAnalytics($analytics);
    }

    public function computeMembers()
    {
        $members = Member::get(['name', 'email']);
        return $this->downloadAnalytics($members->toArray());
    }

    public function computeChurches()
    {
        $churches = User::get(['name', 'email']);
        return $this->downloadAnalytics($churches->toArray());
    }

    public function computeMissionaries()
    {
        $missions = NonMember::get(['name', 'email']);
        return $this->downloadAnalytics($missions->toArray());
    }

    public function computeGuests()
    {
        $missions = Guest::get(['name', 'email', 'phone', 'country', 'purpose']);
        return $this->downloadAnalytics($missions->toArray());
    }

    public function downloadAnalytics($list = array())
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=data.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list)
        {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };
        $this->alert('success', 'Data Generated Successfully', 'Check your downloads directory for the CSV file');
        return response()->stream($callback, 200, $headers);
    }

    public function alert($type, $title, $text="Press Ok to Continue"){
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' => $text
        ]);
    }

    public function render()
    {
        return view('livewire.admin.pages.admin-analytics-page');
    }
}
