<div>

      
         <x-form-section submit="submit">
        <x-slot name="form">
          

            <div class="col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="group.name" value=""/>
                <x-jet-input-error for="group.name" class="mt-2" />
            </div>

          

            <div class="col-span-2">
                <x-jet-label for="no_of_accounts" value="{{ __('No Of Accounts') }}" />
                <x-jet-input id="no_of_accounts" type="text" class="mt-1 block w-full" wire:model.defer="group.accounts" />
                <x-jet-input-error for="group.accounts" class="mt-2" />
            </div>
            @if(!$this->group->exists)
                <div class="col-span-2">
                <div class="groupcheck">
                    <input name="group.selected_group" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" id="selected_group" wire:model="group.selected_group">
                    <span class="ml-2 text-gray-700">Create Multiple Groups</span>
                    <x-jet-input-error for="group.selected_group" class="mt-2" />
                </div>
            </div>
                <div class="col-span-4">
                @if($group->selected_group == true)
                <x-jet-label for="no_of_groups" value="{{ __('No Of Groups') }}" />
                <x-jet-input id="no_of_groups" type="text" class="mt-1 block w-full" wire:model.defer="group.no_of_groups" />
                <x-jet-input-error for="group.no_of_groups" class="mt-2" />
                @endif
                </div>
            @endif
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
               {{ __(!$this->group->exists ? 'Create' : 'Update') }}
            </x-jet-button>
        </x-slot>
    </x-form-section>
</div>
