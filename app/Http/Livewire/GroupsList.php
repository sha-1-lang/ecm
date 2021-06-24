<?php

namespace App\Http\Livewire;

use App\Actions\SendWebhookDummyData;
use App\Actions\TestConnection;
use App\Models\Groups;
use App\Tools;
use Livewire\Component;
use Livewire\WithPagination;

class GroupsList extends Component
{
    use WithPagination;
    //public Group $groupsm;
    public bool $confirmingGroupsDeletion = false;
    public ?Connection $groupsmBeingDeleted = null;

    

    public function confirmGroupsDeletion(Group $groupsm): void
    {
        $this->confirmingGroupsDeletion = true;
        $this->groupsBeingDeleted = $groupsm;
    }

    public function deleteGroups(): void
    {
        $this->groupsBeingDeleted->delete();

        $this->confirmingGroupsDeletion = false;
    }
}
