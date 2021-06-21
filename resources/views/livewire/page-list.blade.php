<div>
    <x-action-section>
        <x-slot name="title">
            {{ __('Manage Pages') }}
        </x-slot>

        <x-slot name="content">
            <div class="space-y-6">
                @if($this->pages->isNotEmpty())
                    @foreach($this->pages as $page)
                        <div class="flex items-center justify-between">
                            <div>
                                <a href="{{ $page->full_url }}" target="_blank">
                                    {{ $page->full_url.'/' }}
                                </a>
                            </div>

                            <div class="flex items-center">
                                <a href="{{ $page->full_url.'/' }}" data-copy="{{ $page->full_url.'/' }}" class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none">
                                    {{ __('Copy link') }}
                                </a>

                                <a href="{{ $page->full_url.'/' }}" target="_blank" class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none">
                                    {{ __('Open') }}
                                </a>

                                <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="cursor-pointer ml-6 text-sm text-gray-400 focus:outline-none">
                                    {{ __('Edit') }}
                                </a>

                                <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="confirmPageDeletion({{ $page->id }})">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                    @if($this->pages->hasPages())
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{ $this->pages->fragment('')->links() }}
                        </div>
                    @endif
                @else
                    <div>{{ __('No pages yet.') }}</div>
                @endif

            </div>
        </x-slot>
    </x-action-section>

    <!-- Delete Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingPageDeletion">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this page?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingPageDeletion')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deletePage" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
