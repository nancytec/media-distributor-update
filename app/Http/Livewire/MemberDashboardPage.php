<?php

namespace App\Http\Livewire;

use App\Models\ChurchMemberFileLink;
use App\Models\MediaLinkView;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MemberDashboardPage extends Component
{
    public $totalLinks;
    public $medias;
    public $church;

    public function mount()
    {
        $this->countMediaLinks();
        $this->countTotalChurchMedia();
    }

    public function fetchChurch(){

    }

    public function countMediaLinks()
    {
        $this->totalLinks = ChurchMemberFileLink::where('email', Auth::guard('member')->user()->email)->count();
    }

    public function countTotalChurchMedia()
    {
        $this->medias = ChurchMemberFileLink::where('church_slug', Auth::guard('member')->user()->church->slug)->count();
//        $this->views = Auth::guard('member')->user()->church->slug;
    }

    public function render()
    {
        return view('livewire.member.pages.member-dashboard-page');
    }
}
