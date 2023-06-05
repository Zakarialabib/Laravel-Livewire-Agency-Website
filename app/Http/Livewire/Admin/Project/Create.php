<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
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

    public $project;

    public $image;

    public $featured_image;
    
    public $createModal;

    protected $listeners = [
        'createModal',
    ];

    protected $rules = [
        'project.title' => 'required|unique:projects,title|max:191',
        'project.content' => 'required',
        'project.client_name' => 'required',
        'project.link' => 'required',
        'project.service_id' => 'required',
        'project.meta_keywords' => 'nullable',
        'project.meta_description' => 'nullable',
        'project.language_id' => 'required',
    ];

  
    public function createModal()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->project = new Project();
        
        $this->createModal = true;
    }

    public function submit()
    {
        $this->project->slug = Str::slug($this->project->title);

        if ($this->featured_image) {
            $imageName = Str::slug($this->project->title).'.'.$this->featured_image->extension();
            $this->featured_image->storeAs('projects', $imageName);
            $this->project->featured_image = $imageName;
        }

        // Multiple images within an array

        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('project', 'public');
        }

        $this->images = json_encode($this->images);

        $this->project->gallery = $this->images;

        $this->project->save();

        $this->alert('success', __('Service created successfully!'));
        
        $this->emit('refreshIndex');

        $this->createModal = false;

    }

    public function render()
    {
        return view('livewire.admin.project.create');
    }

    public function getLanguagesProperty()
    {
        return Language::pluck('name', 'id')->toArray();
    }
    
    public function getServicesProperty()
    {
        return Service::select('title', 'id')->get();
    }
}
