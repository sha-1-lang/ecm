<div>
    <x-action-section>
        <x-slot name="title">
            {{ __('Manage Events') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-6">
                @if($this->Eventgroups->isNotEmpty())
                    @foreach($this->Eventgroups as $event)

                        <div class="flex items-center justify-between">
                            <div>
                                {{ $event->event_name }}
                            </div>
                            <!-- <div>
                                {{ $event->location }}
                            </div>
                            <div>
                                {{ $event->group_name }}
                            </div>
                            <div>
                                {{ $event->description }}
                            </div> -->

                            <div class="flex items-center">
                              
                                
                                <a href="{{ route('eventcalender.edit',$event->id) }}" class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none">
                                    {{ __('Edit') }}
                                </a>
                                <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="confirmEventDeletion({{ $event->id }})">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                     @if($this->Eventgroups->hasPages())
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $this->Eventgroups->fragment('')->links() }}
                        </div>
                    @endif
                @else
                    <div>{{ __('No account groups yet.') }}</div>
                @endif

            </div>
        </x-slot>
    </x-action-section>

<!-- Delete Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingEventDeletion">
        <x-slot name="title">
            {{ __('Delete Events') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this event?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingEventDeletion')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteEvent" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

    
</div>
