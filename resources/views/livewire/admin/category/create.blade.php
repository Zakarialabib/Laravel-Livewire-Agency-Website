<div>
    <!-- Create Modal -->
    <x-modal wire:model="createModal">
        <x-slot name="title">
            {{ __('Create Category') }}
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="create">
                <div class="grid grid-cols-2 gap-2">
                    <div class="w-full">
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                            wire:model="category.name" />
                        <x-input-error :messages="$errors->get('category.name')" for="category.name" class="mt-2" />
                    </div>
                </div>

                <div class="w-full">
                    <x-label for="description" :value="__('Description')" />
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                        wire:model="category.description" />
                    <x-input-error :messages="$errors->get('category.description')" for="category.description" class="mt-2" />
                </div>

                <div class="w-full my-2">
                    <x-label for="image" :value="__('RaceLocation Image')" />
                    <x-media-upload title="{{ __('RaceLocation Image') }}" name="image" wire:model="image"
                        :file="$image" single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                </div>

                <div class="w-full">
                    <x-button primary type="submit" wire:loading.attr="disabled" class="w-full">
                        {{ __('Create') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
    </x-modal>
    <!-- End Create Modal -->
</div>
