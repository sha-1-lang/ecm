<div>
    <x-form-section submit="submit">
        <x-slot name="title">
            Event Data
        </x-slot>

        <x-slot name="description">
            Events Detailed Information
        </x-slot>
        <x-slot name="form">
         
            <div class="col-span-6">
                <x-jet-label for="event_name" value="{{ __('Event Name') }}" />
                <x-jet-input id="event_name" type="text" class="mt-1 block w-full" wire:model.defer="event.event_name" />
                <x-jet-input-error for="event.event_name" class="mt-2" />
            </div>

            <div class="col-span-6">
                <x-jet-label for="time" value="{{ __('Time') }}" />
                <x-jet-input id="time" type="datetime-local" class="mt-1 block w-full" wire:model.defer="event.time" />
                <x-jet-input-error for="event.time" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-jet-label for="location" value="{{ __('Location') }}" />
                <x-jet-input id="location" type="location" class="mt-1 block w-full" wire:model.defer="event.location" />
                <x-jet-input-error for="event.location" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-jet-label for="group_name" value="{{ __('Add Group') }}" />
                <x-select name="group_name" class="mt-1" wire:model="event.group_name">
                    <option value=""></option>
                    @foreach($this->EventGroups as $groups)
                    <option value="{{ $groups->id }}">
                        {{ $groups->name }}
                    </option>
                    @endforeach
                </x-select>
                <x-jet-input-error for="event.group_name" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <x-jet-input id="description" type="textarea" class="mt-1 block w-full" wire:model.defer="event.description" />
                <x-jet-input-error for="event.description" class="mt-2" />
            </div>

            

            
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                
                {{ __(!$this->event->exists ? 'Create' : 'Update') }}
            </x-jet-button>
        </x-slot>
    </x-form-section>
</div>


