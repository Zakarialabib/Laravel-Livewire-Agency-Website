<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="py-10" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="w-full">
            <x-label for="language_id" :value="__('Language')" />
            <select wire:model="team.language_id"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500  lang"
                name="language_id">
                <option value="" selected>{{ __('Select a Language') }}</option>
                @foreach ($langs as $lang)
                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="team.language_id" />
        </div>

       
        <div class="flex flex-wrap">
            <div class="w-1/2 sm:w-full">
                <x-label for="name" :value="__('Name')" />
                <input type="text" name="name" wire:model.lazy="team.name"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                placeholder="{{ __('Name') }}" value="{{ old('name') }}">
                <x-input-error for="team.name" />
            </div>
            <div class="w-1/2 sm:w-full">
                <x-label for="role" :value="__('Role')" />
                <input type="text" name="role" wire:model.lazy="team.role"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 "
                placeholder="{{ __('Role') }}" value="{{ old('role') }}">
                <x-input-error for="team.role" />
            </div>
        </div>
        <div class="w-full">
            <x-label for="content" :value="__('Description')" />
            <x-input.rich-text wire:model.lazy="team.content" id="description" />
            <x-input-error for="team.content" />
        </div>
        <div class="w-full">
            <x-label for="image" :value="__('Image')" />
            <x-fileupload wire:model="image" :file="$image" accept="image/jpg,image/jpeg,image/png" />
            <p class="help-block text-info">
                {{ __('Upload 670X418 (Pixel) Size image for best quality. Only jpg, jpeg, png image is allowed.') }}
            </p>
            <x-input-error for="team.image" />
        </div>
        <div class="w-full">
            <x-label for="status" :value="__('Status')" />
            <select wire:model="team.status" name="status"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-zinc-700 dark:text-zinc-300 rounded border border-zinc-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 ">
                <option value="0">{{ __('Unpublish') }}</option>
                <option value="1">{{ __('Publish') }}</option>
            </select>
            <x-input-error for="team.status" />
        </div>
        <div class="w-full">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</div>

@push('scripts')
     <!-- Image Upload -->
     <script type="text/javascript"  src="{{ asset('js/image-upload.js') }}"></script>
@endpush