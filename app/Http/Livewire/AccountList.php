<?php

namespace App\Http\Livewire;


use App\Actions\SendWebhookDummyData;
use App\Actions\TestConnection;
use App\Models\Groups;
use App\Models\Email;
use App\Tools;
use Livewire\Component;
use Livewire\WithPagination;

class AccountList extends Component
{
    use WithPagination;
     public bool $confirmingGroupDeletion = false;
    public ?int $groupIdBeingDeleted;

public function getGroupsProperty()
    {
        return Groups::latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.account-list');
    }
     public function confirmGroupDeletion($groupId)
    {
        $this->confirmingGroupDeletion = true;
        $this->groupIdBeingDeleted = $groupId;
    }

    public function deleteGroup()
    {
        
        try{
            Groups::query()->findOrNew($this->groupIdBeingDeleted)->delete();
            Email::where('group_id',$this->groupIdBeingDeleted)->update(array('group_id'=>NULL));
            $this->confirmingGroupDeletion = false;
            
           }catch(\Exception $e){
             $this->confirmingGroupDeletion = false;
           }
    }
}
