<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\SendWebhookDummyData;
use App\Actions\TestConnection;
use App\Models\Groups;
use App\Models\Event;
use App\Models\Email;
use App\Tools;
use Livewire\WithPagination;

class EventCalenderList extends Component
{
        use WithPagination;
        public bool $confirmingEventDeletion = false;
        public ?int $eventIdBeingDeleted;

public function getEventgroupsProperty(){
        return Event::latest()->paginate(10);
    }


    public function render()
    {
        return view('livewire.event-calender-list');
    }
    public function confirmEventDeletion($eventId)
    {
        $this->confirmingEventDeletion = true;
        $this->eventIdBeingDeleted = $eventId;
    }

    public function deleteEvent()
    {
        
        try{
            Event::query()->findOrNew($this->eventIdBeingDeleted)->delete();
            $this->confirmingEventDeletion = false;
            
           }catch(\Exception $e){
             $this->confirmingEventDeletion = false;
           }
    }

}
