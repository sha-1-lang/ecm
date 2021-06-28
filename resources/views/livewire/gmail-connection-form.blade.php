<div>
    <x-form-section submit="submit">
        <x-slot name="title">
            Gmail Connection data
        </x-slot>

        <x-slot name="description">
            Account credentials.
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="gmailconnection.email_id" />
                <x-jet-input-error for="gmailconnection.email_id" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="gmailconnection.password" />
                <x-jet-input-error for="gmailconnection.password" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-jet-label for="alternatepassword" value="{{ __('Alternate Email ID') }}" />
                <x-jet-input id="alternatepassword" type="text" class="mt-1 block w-full" wire:model.defer="gmailconnection.alternatepassword" />
                <x-jet-input-error for="gmailconnection.alternatepassword" class="mt-2" />
            </div>
            <div class="col-span-6">
                <x-jet-label for="alternatemailid" value="{{ __('Alternate Password') }}" />
                <x-jet-input id="alternatemailid" type="password" class="mt-1 block w-full" wire:model.defer="gmailconnection.alternatemailid" />
                <x-jet-input-error for="gmailconnection.alternatemailid" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-button>
                {{ __(!$this->gmailconnection->exists ? 'Create' : 'Update') }}
            </x-jet-button>
        </x-slot>
    </x-form-section>
</div>
