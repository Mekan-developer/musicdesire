<?php

namespace App\Http\Livewire;

use App\Mail\ZayavkaMail;
use App\Models\UserApply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class LeftApply extends Component
{
    use WithFileUploads;

    public $apply_duration, $apply_name, $apply_beep, $apply_description, $apply_contact, $file;
    protected $rules = [
        'apply_duration' => 'required|string',
        'apply_name' => 'required|string',
        'apply_beep' => 'required|string|in:yes,no',
        'apply_description' => 'required|string',
        'apply_contact' => 'required|string',
        'file' => 'required|file|mimes:mp3,wav,ogg|max:10240'
    ];
    protected $messages = [
        'apply_duration.required' => 'Введите продолжительность',
        'apply_name.required' => 'Введите имя',
        'apply_description.required' => 'Заполните поле',
        'apply_beep.required' => 'Укажите выбор',
        'apply_contact.required' => 'Укажите данные контакта',
        'file.required' => 'Загрузите исходный файл',
        'file.mimes' => 'Тип файла не поддерживается',
    ];

    public function resetFields()
    {
        $this->apply_duration = '';
        $this->apply_beep = '';
        $this->apply_name = '';
        $this->apply_description = '';
        $this->apply_contact = '';
        $this->file = '';
    }

    public function render()
    {
        return view('livewire.left-apply');
    }

    public function showApplyModal()
    {
        $this->dispatchBrowserEvent('show-apply-modal');
    }
    public function closeApplyModal()
    {
        $this->resetFields();
        $this->dispatchBrowserEvent('close-apply-modal');
    }

    public function addApply()
    {
        $this->validate();

        $newApply = new UserApply;
        $user = Auth::user();
        if ($user) {
            $newApply->user_id = $user->id;
        }
        $newApply->duration = $this->apply_duration;
        $newApply->beep = $this->apply_beep == 'yes' ? 1 : 0;
        $newApply->name = $this->apply_name;
        $newApply->description = $this->apply_description;
        $newApply->contact = $this->apply_contact;
        $newApply->file = $this->file->store('public/applies');
        $newApply->save();
        Mail::to('yourmusicdesire@gmail.com')->send(new ZayavkaMail($newApply));

        $this->closeApplyModal();
    }

    public function sendMail() {
    }
}
