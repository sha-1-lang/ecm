<?php

namespace App\Http\Livewire;

use App\Tools;
use App\Models\GmailConnection;
use Illuminate\Validation\Rule;
use Livewire\Component;

class GmailConnectionForm extends Component
{
    public GmailConnection $gmailconnection;

    public function render()
    {
        return view('livewire.gmail-connection-form');
    }



    public function rules(): array
    {
        return [
            'gmailconnection.email_id' => ['required', 'string','unique:gmail_connections,email_id'],
            'gmailconnection.password' => ['required'],
            'gmailconnection.alternatemailid' => ['required'],
            'gmailconnection.alternatepassword' => ['required'],
            
        ];
    }

    public function mount(GmailConnection $gmailconnection)
    {
        
        $this->gmailconnection = $gmailconnection;
    }

    public function submit(): void
    {
        if($this->gmailconnection->id == ''){
            $this->validate();
        }

        $this->gmailconnection->save();

        $this->redirectRoute('gmailconnection.index');
    }
}
