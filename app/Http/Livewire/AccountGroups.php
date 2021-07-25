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
    public $update_case;
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

      public function mount(Groups $group)
    {

        $this->group = $group;
       
        if($this->group->id){
            $this->update_case = 1;
        }
        $this->group->tool = Tools::current();

      
    }

    public function submit()
    {
            
        if($this->group->id == ''){
            $this->validate();
            //$res = $this->validate();
        }
        $accounts = $this->group->accounts;
        $res = $this->group;
        if($this->update_case == 1){
           unset($this->group['no_of_groups']);
            unset($this->group['selected_group']);
            $this->group->save();
            $g_id = $this->group->id;
            Email::where('group_id',$g_id)->update(array('group_id'=>NULL));
            Email::whereNull('group_id')->limit($accounts)->update(array('group_id'=>$g_id));
        }
        
        if(isset($this->group->no_of_groups)){
            $loop = $this->group->no_of_groups;
             $count = 1;
             
            for($i=0; $i<$loop; $i++){
            
                $name = $this->group->name.$count;
                $values = array( 'name'=>$name,'accounts'=>$this->group->accounts,'no_of_groups'=>$this->group->no_of_groups,'selected_group'=>$this->group->selected_group);
                $g_id=Groups::create($values)->id;
 
                $limit=$this->group->accounts;
                Email::where('group_id',$g_id)->update(array('group_id'=>NULL));
                Email::whereNull('group_id')->limit($limit)->update(array('group_id'=>$g_id));
                $count++;

              }
        }else{
            
            unset($this->group['no_of_groups']);
            unset($this->group['selected_group']);
            $this->group->save();
            $g_id = $this->group->id;
            Email::where('group_id',$g_id)->update(array('group_id'=>NULL));
            Email::whereNull('group_id')->limit($accounts)->update(array('group_id'=>$g_id));

        }


        $this->redirectRoute('groups.index');
    }


}
