<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Language;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class Create extends Component
{
    use LivewireAlert;

    /** @var string[] */
    public $listeners = ['createLanguage'];

    public array $languages = [];

    public $language;
    public $name;
    public $code;

    public $createLanguage = false;

    protected $rules = [
        'name' => 'required|max:191',
        'code' => 'required',
    ];

    public function createLanguage()
    {
        $this->createLanguage = true;
    }

    public function create()
    {
        $this->validate();

        $this->language->save();

        File::copy(App::langPath().('/en.json'), App::langPath().('/'.$this->code.'.json'));

        $this->alert('success', __('Data created successfully!'));

        $this->dispatch('resetIndex');

        $this->createLanguage = false;
    }

    public function render()
    {
        return view('livewire.admin.language.create');
    }
}