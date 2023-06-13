<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use App\Models\Language;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $service;

    public $image;
    
    public $createModal = false;

    protected $listeners = [
        'createModal',
    ];

    protected $rules = [
        'service.language_id' => 'required',
        'service.title' => 'required|unique:services,title|max:191',
        'service.type' => 'required',
        'service.features' => 'nullable',
        'service.options' => 'nullable',
        'service.content' => 'nullable',
    ];

    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->createModal = true;

        $this->service = new Service();
    }

    public function render()
    {
        return view('livewire.admin.service.create');
    }

    public function submit()
    {
        $this->validate();

        $this->service->slug = Str::slug($this->service->title);
 
        if ($this->image) {
            $imageName = Str::slug($this->service->title).'.'.$this->image->extension();
            $this->image->storeAs('services', $imageName);
            $this->service->image = $imageName;
        }

        $this->service->save();

        $this->alert('success', __('Service created successfully!'));

        $this->emit('refreshIndex');

        $this->createModal = false;

    }

    public function getLanguagesProperty()
    {
        return Language::pluck('name', 'id')->toArray();
    }
}
