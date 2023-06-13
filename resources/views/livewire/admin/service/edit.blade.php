<div>
    <x-modal wire:model="editModal">
        <x-slot name="title">
            {{ __('Update Service') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form enctype="multipart/form-data" wire:submit.prevent="submit">
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <x-label for="language_id" :value="__('Language')" />
                        <select wire:model="service.language_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  lang"
                            name="language_id">
                            <option value="" selected>{{ __('Select a Language') }}</option>
                            @foreach ($this->languages as $index => $lang)
                                <option value="{{ $index }}">{{ $lang }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('service.language_id')" for="service.language_id" class="mt-2" />
                    </div>
                    <div class="">
                        <x-label for="type" :value="__('Type')" />
                        <select wire:model.lazy="service.type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 ">
                            <option value="" selected>{{ __('Type') }}</option>
                            <option value="digital">{{ __('Digital') }}</option>
                            <option value="startup">{{ __('Startup') }}</option>
                        </select>
                        <x-input-error :messages="$errors->get('service.type')" for="service.type" class="mt-2" />
                    </div>
                </div>
                <div class="w-full">
                    <x-label for="title" :value="__('Title')" />
                    <input type="text" name="title" wire:model.lazy="service.title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
                        placeholder="{{ __('Title') }}" value="{{ old('title') }}">
                    <x-input-error :messages="$errors->get('service.title')" for="service.title" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-label for="content" :value="__('Description')" />
                    <x-input.rich-text wire:model.lazy="service.content" id="description" />
                    <x-input-error :messages="$errors->get('service.content')" for="service.content" class="mt-2" />
                </div>
                <div class="flex flex-wrap py-10">
                    <div class="w-2/5">
                        <img class="w-52 rounded-full" src="{{ asset('uploads/services/' . $image) }}" alt="">
                    </div>
                    <div class="w-3/5">
                        <x-label for="image" :value="__('Feature Image')" />
                        <x-fileupload wire:model="image" accept="image/jpg,image/jpeg,image/png" />
                        <p class="help-block text-info">
                            {{ __('Upload 670X418 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
                        </p>
                        <x-input-error :messages="$errors->get('service.image')" for="service.image" class="mt-2" />
                    </div>
                </div>
                <div class="w-full text-center py-4">
                    <x-button type="submit" primary>
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>
</div>
