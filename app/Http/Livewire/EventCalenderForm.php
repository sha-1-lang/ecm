<?php

namespace App\Http\Livewire;


use App\Models\Event;
use App\Models\Groups;
use App\Models\Email;
use App\Tools;
use Livewire\Component;
use Livewire\WithPagination;

class EventCalenderForm extends Component
{
    public Event $event;


     public function rules(): array
    {
        return [
            'event.event_name' => ['required'],
            'event.time' => ['required'],
            'event.location' => ['required', 'string'],
            'event.group_name' => ['required', 'string'],
            'event.description' => ['required', 'string'],
        ];
    }
    public function render()
    {
        return view('livewire.event-calender-form');
    }

    
      public function mount(Event $event): void
    {
       
        $this->event = $event;
        // $this->event->tool = Tools::current();

      
    }

    public function getEventgroupsProperty(){
        return Groups::get();
    }

     public function submit()
    {
        
        if($this->event->id == ''){

            $this->validate();
        }
        $this->event->save();


    }
}
