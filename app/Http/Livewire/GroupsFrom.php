<?php

namespace App\Http\Livewire;
use DB;
use App\Tools;
use App\Models\Connection;
use App\Models\Groups;
use Illuminate\Validation\Rule;
use Livewire\Component;

class GroupForm extends Component
{
    public Group $groupsm;
   // public $groupsm;

    public function rules(): array
    {
        return [
            'group.name' => ['required', 'string','unique:name'],
            'group.accounts' => ['required'],
        ];
    }

    public function mount(Group $groupsm): void
    {
        $this->group = $groupsm;

        
    }

    public function submit(): void
    {
        
            $this->validate();
        

        $this->group->save();

        $this->redirectRoute('groups.index');
    }
}



