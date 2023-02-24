<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Settings;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $company_name;

    public $site_title;

    public $logoFile;

    public $iconFile;

    public $favicon;

    public $siteImage;

    public $currency_code;

    public $currency_symbol;

    public $company_email_address;

    public $company_phone;

    public $company_address;

    public $social_facebook;

    public $social_twitter;

    public $social_instagram;

    public $social_linkedin;

    public $social_whatsapp;

    public $head_tags;

    public $body_tags;

    public $seo_meta_title;

    public $seo_meta_description;

    public $footer_copyright_text;

    public $enableRegistrationTerms;

    public $currency_position;

    public $site_maintenance_message;

    public $site_tax;

    public $site_shipping;

    public $site_return;

    public $site_refund;

    public $site_terms;

    public $site_privacy;

    public $site_about;

    public $site_contact;

    protected $listeners = ['save', 'uploadFavicon', 'uploadLogo'];

    public function mount()
    {
        $this->company_name = settings()->company_name;
        $this->site_title = settings()->site_title;
        $this->company_email_address = settings()->company_email_address;
        $this->company_phone = settings()->company_phone;
        $this->company_address = settings()->company_address;
        $this->siteImage = settings()->site_logo;
        $this->favicon = settings()->site_favicon;
        $this->social_facebook = settings()->social_facebook;
        $this->social_twitter = settings()->social_twitter;
        $this->social_instagram = settings()->social_instagram;
        $this->social_linkedin = settings()->social_linkedin;
        $this->social_whatsapp = settings()->social_whatsapp;
        $this->head_tags = settings()->head_tags;
        $this->body_tags = settings()->body_tags;
        $this->seo_meta_title = settings()->seo_meta_title;
        $this->seo_meta_description = settings()->seo_meta_description;
        $this->footer_copyright_text = settings()->footer_copyright_text;
        $this->enableRegistrationTerms = (bool) settings()->enableRegistrationTerms;
        $this->currency_code = settings()->currency_code;
        $this->currency_symbol = settings()->currency_symbol;
        $this->currency_position = settings()->currency_position;
        $this->site_maintenance_message = settings()->site_maintenance_message;
        $this->is_ecommerce = settings()->is_ecommerce;
        $this->is_onepage = settings()->is_onepage;
    }

    public function save()
    {
        $settings = [
            'company_name' => $this->company_name,
            'site_title' => $this->site_title,
            'company_email_address' => $this->company_email_address,
            'company_phone' => $this->company_phone,
            'company_address' => $this->company_address,
            'social_facebook' => $this->social_facebook,
            'social_twitter' => $this->social_twitter,
            'social_instagram' => $this->social_instagram,
            'social_linkedin' => $this->social_linkedin,
            'social_whatsapp' => $this->social_whatsapp,
            'head_tags' => $this->head_tags,
            'body_tags' => $this->body_tags,
            'seo_meta_title' => $this->seo_meta_title,
            'seo_meta_description' => $this->seo_meta_description,
            'footer_copyright_text' => $this->footer_copyright_text,
            'enableRegistrationTerms' => $this->enableRegistrationTerms,
            'currency_code' => $this->currency_code,
            'currency_symbol' => $this->currency_symbol,
            'currency_position' => $this->currency_position,
            'site_maintenance_message' => $this->site_maintenance_message,
            'is_ecommerce' => $this->is_ecommerce,
            'is_onepage' => $this->is_onepage,
        ];

        foreach ($settings as $key => $value) {
            Settings::set($key, $value);
        }

        $this->alert('success', __('Settings updated successfully!'));
    }

    public function uploadFavicon()
    {
        $favicon = $this->upload($this->iconFile, $this->favicon, 'iconFile');

        if ($favicon) {
            Settings::set('site_favicon', $favicon);
            $this->alert('success', __('Favicon updated successfully!'));
            $this->iconFile = '';
            $this->favicon = $favicon;
        } else {
            $this->alert('error', __('Unable to upload your image'));
        }
    }

    public function uploadLogo()
    {
        $logo = $this->upload($this->logoFile, $this->siteImage, 'logoFile');

        if ($logo) {
            Settings::set('site_logo', $logo);
            $this->alert('success', __('Logo updated successfully!'));
            $this->logoFile = '';
            $this->siteImage = $logo;
        } else {
            $this->alert('error', __('Unable to upload your image'));
        }
    }

    public function render(): View|Factory
    {
        return view('livewire.admin.settings.index');
    }

    private function upload($filename, $name, $validateName)
    {
        $this->validate([
            $validateName => 'required|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($name !== null) {
            Storage::delete('logo/'.$name);
        }

        return $filename->store('logo');
    }
}
