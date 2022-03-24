<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="py-10">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 lang"
                name="language_id" id="blog_lan" wire:model="language_id">
                <option value="" selected disabled>{{ __('Select a Language') }}</option>
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('language_id'))
                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="image" :value="__('Image')" />
            <img class="mw-400 mb-3 show-img img-demo" src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="">
            <div class="custom-file">
                <label class="custom-file-label" for="image">{{ __('Choose Image') }}</label>
                <input type="file" class="custom-file-input up-img" name="image" id="image" wire:model="image">
            </div>
            @if ($errors->has('image'))
                <p class="text-danger"> {{ $errors->first('image') }} </p>
            @endif
            <p class="help-block text-info">
                {{ __('Upload 730X455 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
            </p>
        </div>
        <div class="w-full">
            <x-label for="title" :value="__('Title')" />
            <input type="text" wire:model="title"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <p class="text-danger"> {{ $errors->first('title') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="bcategory_id" :value="__('Category')" />
                <x-select-list
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    required id="bcategory_id" name="bcategory_id" wire:model="bcategory_id"
                    :options="$this->listsForFields['bcategories']" multiple />
            @if ($errors->has('bcategory_id'))
                <p class="text-danger"> {{ $errors->first('bcategory_id') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="content" :value="__('Content')" />
            <textarea name="content" wire:model="content"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 summernote"
                placeholder="{{ __('Content') }}">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <p class="text-danger"> {{ $errors->first('content') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="meta_keywords" :value="__('Meta Keywords')" />
            <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                data-role="tagsinput" name="meta_keywords" wire:model="meta_keywords"
                placeholder="{{ __('Meta Keywords') }}" value="{{ old('meta_keywords') }}">
            @if ($errors->has('meta_keywords'))
                <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="meta_description" :value="__('Meta Description')" />
            <textarea class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="meta_description" wire:model="meta_description" placeholder="{{ __('Meta Description') }}"
                rows="4">{{ old('meta_description') }}</textarea>
            @if ($errors->has('meta_description'))
                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
            @endif
        </div>
        <div class="w-full">
            <x-label for="status" :value="__('Status')" />
            <select wire:model="status"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc700 dark:text-zinc300 rounded border border-zinc300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                name="status">
                <option value="0" selected>{{ __('Unpublish') }}</option>
                <option value="1">{{ __('Publish') }}</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-danger"> {{ $errors->first('status') }} </p>
            @endif
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">{{ __('Save') }}</button>
        </div>
    </form>
</div>
