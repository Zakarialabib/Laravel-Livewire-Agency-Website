<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Section;

use App\Models\Language;
use App\Models\Section;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $section;

    public $image;

    public $createSection = false;

    public $listeners = [
        'createSection',
    ];

    protected $rules = [
        'section.language_id' => 'required',
        'section.page_id' => 'required',
        'section.title' => 'nullable',
        'section.featured_title' => 'nullable', 
        'section.subtitle' => 'nullable',
        'section.bg_color' => 'nullable',
        'section.text_color' => 'nullable',
        'section.button' => 'nullable',
        'section.position' => 'nullable',
        'section.label' => 'nullable',
        'section.link' => 'nullable',
        'section.description' => 'nullable',
        'section.embeded_video' => 'nullable',
    ];

    public function createSection()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->createSection = true;

        $this->section = new Section();
    }
    
    public function render(): View|Factory
    {
        return view('livewire.admin.section.create');
    }

    public function getLanguagesProperty(): Collection
    {
        return Language::select('name', 'id')->get();
    }

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $imageName = Str::slug($this->section->title).'-'.date('Y-m-d H:i:s').'.'.$this->image->extension();
            $this->image->storeAs('sections', $imageName);
            $this->section->image = $imageName;
        }

        $this->section->save();

        $this->emit('refreshIndex');

        $this->alert('success', __('Section created successfully!'));

        $this->createSection = false;
    }
}
