<?php

namespace App\Http\Livewire;

use App\Tools;
use App\Models\Groups;
use App\Models\Email;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AccountGroups extends Component
{
    public Groups $group;
    public function rules(): array
    {
        return [
            
            'group.name' => ['required', 'string','unique:groups,name'],
            'group.accounts' => ['required'],
            'group.selected_group' => ['nullable'],
            'group.no_of_groups' =>['nullable']
        ];
    }
    public function render()
    {

        return view('livewire.account-groups');
    }

      public function mount(Groups $group): void
    {
        $this->group = $group;
        $this->group->tool = Tools::current();

      
    }

    public function submit()
    {
        
        if($this->group->id == ''){
            $this->validate();
        }
        $res = $this->validate();
        $accounts = $res['group']['accounts'];
        if(isset($res['group']['no_of_groups'])){
            $loop = $res['group']['no_of_groups'];
             $count = 1;
             
            for($i=0; $i<$loop; $i++){
            
                $name = $res['group']['name'].$count;
                $values = array( 'name'=>$name,'accounts'=>$res['group']['accounts'],'no_of_groups'=>$res['group']['no_of_groups'],'selected_group'=>$res['group']['selected_group']);
                $g_id=Groups::create($values)->id;
 
                $limit=$res['group']['accounts'];
          
                Email::whereNull('group_id')->limit($limit)->update(array('group_id'=>$g_id));
                $count++;

              }
        }else{
            unset($this->group['no_of_groups']);
            unset($this->group['selected_group']);
            $this->group->save();
            $g_id = $this->group->id;
            Email::whereNull('group_id')->limit($accounts)->update(array('group_id'=>$g_id));

        }


        $this->redirectRoute('groups.index');
    }


}
