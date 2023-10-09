<?php

namespace App\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSellerHeaderProfileInfo extends Component
{
    public $admin;
    public $seller;

    public $listeners = [
        'updateAdminSellerHeaderInfo' => '$refresh'
    ];

    public function mount()
    {
        if(Auth::guard('admin')->check()){
            $this->admin = Admin::findOrFail(auth()->id());
        }
    }

    public function render()
    {
        return view('livewire.admin-seller-header-profile-info');
    }
}
