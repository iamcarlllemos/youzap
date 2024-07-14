<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OtherProfile extends Component
{
    public function render()
    {
        $id = Auth::user()->id;
        $data = User::where('id', '!=', $id)->get();

        return view('livewire.other-profile', compact('data'));
    }
}
