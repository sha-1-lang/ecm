<div>
    <x-action-section>
        <x-slot name="title">
            {{ __('Manage Gmail Connections') }}
        </x-slot>

        <x-slot name="description">
            Contains Account credentials.
        </x-slot>

        <x-slot name="content">
            <div class="space-y-6">
                @if ($this->GmailConnections->isNotEmpty())
                    @foreach ($this->GmailConnections as $gconn)
                        <div class="flex items-center justify-between">
                            <div>
                                <a href="{{ route('gmailconnection.edit', ['gmailconnection' => $gconn->id]) }}">
                                    {{ $gconn->email_id }}
                                    
                                </a>
                            </div>
                            <div class="flex items-center">
                                
                                    <button class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none" wire:click="">
                                        
                                            {{ __('Test Connection') }}
                                        </button>
                           <a href="{{ route('gmailconnection.edit',['gmailconnection' => $gconn->id]) }}" class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none">
                                    {{ __('Details') }}
                                </a>

                                <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="confirmGmailConnectionDeletion({{ $gconn->id }})">
                                    {{ __('Delete') }}
                                </button> 
                            </div>
                        </div>
                    @endforeach
                    @if($this->GmailConnections->hasPages())
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $this->GmailConnections->fragment('')->links() }}
                        </div>
                    @endif
                @else
                    <div>{{ __('No connections yet.') }}</div>
                @endif
            </div>
        </x-slot>
    </x-action-section>

<!-- Delete Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingGmailConnectionDeletion">
        <x-slot name="title">
            {{ __('Delete connections') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this account?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingGmailConnectionDeletion')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteGmailConnection" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
    
</div>
