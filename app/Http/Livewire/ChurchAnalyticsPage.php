<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChurchAnalyticsPage extends Component
{
    public $totalViews;
    public $totalShares;
    public $totalLikes;
    public  $totalDownloads;

    public $links;

    public function mount()
    {
        $this->fetchTotalViews();
    }

    public function fetchTotalViews()
    {
        $this->links  = ChurchMemberFileLink::where('church_slug', Auth::user()->slug)->get();
        // $links = ChurchMemberFileLink::where('church_slug', Auth::user()->slug)->distinct('media_id')->get();
        $totalViews = 0;
        $totalShares = 0;
        $totalLikes  = 0;
        $totalDownloads = 0;

        foreach ($this->links as $link){
            $totalViews += count($link->views);
            $totalShares += $link->share->count;
            $totalLikes += count($link->likes);
            $totalDownloads += $link->download->count;
        }
        $this->totalViews = $totalViews;
        $this->totalShares = $totalShares;
        $this->totalLikes = $totalLikes;
        $this->totalDownloads = $totalDownloads;
    }

    public function computeStat()
    {
        $analytics =  array([
            'Total_Views' => $this->totalViews,
            'Total_Shares' => $this->totalShares,
            'Total_likes' => $this->totalLikes,
            'Total_Downloads' => $this->totalDownloads,
        ]);

        // $list = User::all()->toArray();
       return $this->downloadAnalytics($analytics);
    }


    public function computeMembers()
    {
        $members = Member::where('church_id', Auth::user()->id)->get(['name', 'email']);
        return $this->downloadAnalytics($members->toArray());
    }

    public function computeMediaLinks(){
        $links  = ChurchMemberFileLink::where('church_slug', Auth::user()->slug)->distinct()->get(['name', 'email', 'link', 'church_slug']);
        return $this->downloadAnalytics($links->toArray());
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
        return view('livewire.church.pages.church-analytics-page');
    }
}
