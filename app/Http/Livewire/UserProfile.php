<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $user_name, $avatar;

    protected $rules = [
        'user_name' => 'required|string|min:5',
        'avatar' => 'nullable|sometimes|image|max:1024'
    ];
    protected $messages = [
        'user_name.required' => 'Введите имя пользователя',
        'user_name.min' => 'Имя должно содержать минимум 5 символов',
        'avatar.max' => "Максимальный размер изображения - 1мб"
    ];
    public function editProfile()
    {
        $this->user_name = Auth::user()->name;
        $this->dispatchBrowserEvent('show-edit-modal');
    }

    public function saveProfile()
    {
        $this->validate();

        $user = Auth::user();
        if ($this->avatar) {
            $user->avatar = $this->avatar->store('public/avatars');
        }
        $user->name = $this->user_name;
        $user->save();
        $this->dispatchBrowserEvent('close-edit-modal');
    }
    public function resetPassword()
    {
        // $this->user_name = Auth::user()->name;
        $this->dispatchBrowserEvent('show-reset-modal');
    }

    public function savePassword()
    {

        $this->dispatchBrowserEvent('close-reset-modal');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
