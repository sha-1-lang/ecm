<?php

namespace App\Http\Livewire;

use App\Actions\SendWebhookDummyData;
use App\Actions\TestConnection;
use App\Models\GmailConnection;
use App\Tools;
use Livewire\Component;
use Livewire\WithPagination;

class GmailConnectionList extends Component
{
    use WithPagination;
    public bool $confirmingGmailConnectionDeletion = false;
   public ?int $gmailconnectionIdBeingDeleted;


    public function getGmailConnectionsProperty()
    {
        return GmailConnection::latest()->paginate(10);
    }
    public function confirmGmailConnectionDeletion($GmailId)
    {
        $this->confirmingGmailConnectionDeletion = true;
        $this->gmailconnectionIdBeingDeleted = $GmailId;
    }

    public function deleteGmailConnection()
    {
        
        try{
            GmailConnection::query()->findOrNew($this->gmailconnectionIdBeingDeleted)->delete();
            $this->confirmingGmailConnectionDeletion = false;
            
           }catch(\Exception $e){
             $this->confirmingGmailConnectionDeletion = false;
           }
    }
}
