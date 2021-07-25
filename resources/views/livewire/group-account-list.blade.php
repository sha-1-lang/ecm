<x-jet-action-section>
    <x-slot name="title">
        {{ __('Accounts in list') }}
    </x-slot>

    <x-slot name="description">
        Accounts belongs to this list.<br>
       
    </x-slot>

    <x-slot name="content">
        @if ($this->emails->isNotEmpty())
            <table id="emails-list" class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($this->emails as $email)
                        <tr>
                            <td class="text-xs px-1 py-1">{{ $email->email }}</td>
                            <td class="text-xs px-1 py-1">
                                @foreach($email->infos as $info)
                                    <div>
                                        <strong>{{ $info->type }}:</strong> {{ $info->value }}
                                    </div>
                                @endforeach
                            </td>
                            <!-- <td class="text-xs px-1 py-1"><button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none" wire:click="confirmAccountDeletion({{ $email->id }})">
                                    {{ __('Delete') }}
                                </button></td> -->
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($this->emails->hasPages())
                <div class="mt-4">
                    {{ $this->emails->fragment('emails-list')->links() }}
                </div>
            @endif
        @else
            <div>{{ __('No emails yet.') }}</div>
        @endif
    </x-slot>
</x-jet-action-section>




