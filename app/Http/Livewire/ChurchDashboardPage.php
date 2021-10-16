<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\Media;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChurchDashboardPage extends Component
{
    public $totalLinks;
    public $totalMembers;
    public $mostViewed;
    public $mostShared;

    public $recentMembers;
    public $mostSharedMedias;

    public function mount()
    {
        $this->fetchTotalLinks();
        $this->fetchTotalMembers();
        $this->fetchMostShared();
        $this->fetchMostViewed();

        $this->fetchMostSharedMedias();
        $this->fetchRecentlyRegisteredMembers();
    }

    public function fetchRecentlyRegisteredMembers()
    {
        $this->recentMembers = Member::orderBy('created_at')->where('church_id', Auth::user()->id)->limit(4)->get();
    }

    public function fetchMostShared()
    {
        $this->mostShared = Media::orderBy('shares', 'DESC')->first();
    }

    public function fetchMostSharedMedias()
    {
        $this->mostSharedMedias = Media::orderBy('shares', 'DESC')->limit(4)->get();
    }

    public function fetchMostViewed()
    {
        $this->mostViewed = Media::orderBy('views', 'DESC')->first();
    }

    public function fetchTotalMembers()
    {
        $this->totalLinks = ChurchMemberFileLink::where('church_slug', Auth::user()->slug)->count();
    }

    public function fetchTotalLinks()
    {
        $this->totalMembers = Member::where('church_id', Auth::user()->id)->count();
    }

    public function render()
    {
        return view('livewire.church.pages.church-dashboard-page');
    }
}
