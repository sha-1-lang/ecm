<div>
    <x-action-section>
        <x-slot name="title">
            {{ __('Manage Groups') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-6">
                @if($this->Groups->isNotEmpty())
                    @foreach($this->Groups as $Group)
                        <div class="flex items-center justify-between">
                            <div>
                                {{ $Group->name }}
                            </div>

                            <div class="flex items-center">
                              

                                <a href="{{ route('groups.edit', ['group' => $Group->id]) }}" class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none">
                                    {{ __('Edit') }}
                                </a>

                                <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="confirmGroupDeletion({{ $Group->id }})">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                     @if($this->Groups->hasPages())
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $this->Groups->fragment('')->links() }}
                        </div>
                    @endif
                @else
                    <div>{{ __('No account groups yet.') }}</div>
                @endif

            </div>
        </x-slot>
    </x-action-section>

    <!-- Delete Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingGroupDeletion">
        <x-slot name="title">
            {{ __('Delete GroupsAccount') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this account?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingGroupDeletion')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteGroup" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
