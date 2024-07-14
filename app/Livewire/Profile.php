<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    protected $listeners = ['updateLastSeen' => 'getLastSeen'];

    public function mount() {
        $this->getLastSeen();
    }

    public function getLastSeen() {
        return 123;
    }

    public function render()
    {
        $id = Auth::user()->id;
        $data = User::where('id', '!=', $id)->get();
        return view('livewire.profile', compact('data'));
    }
}
