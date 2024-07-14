<?php

namespace App\Livewire;

use App\Models\MatchedUsers;
use App\Models\RandomQueue;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RandomConnection extends Component
{


    public $queue_status = '';
    public $status = false;
    public $name = '';
    public $message = '';


    public function mount() {
        if($this->queue_status == '') {
            $this->remove_queue();
        }
    }

    public function connect_random() {
        if($this->queue_status == '') {
            $this->queue_status = 'waiting';
            $this->random_queue();
        } else {
            $this->queue_status = '';
            $this->remove_queue();
        }
    }

    public function random_queue() {
        $id = Auth::user()->id;

        // Check if the user ID already exists in either column
        $existingRecord = RandomQueue::where('user_id_primary', $id)
            ->orWhere('user_id_secondary', $id)
            ->first();
        
        if (!$existingRecord) {
            // No existing record found, check if there's a record with secondary empty
            $recordWithEmptySecondary = RandomQueue::whereNull('user_id_secondary')->first();
        
            if ($recordWithEmptySecondary) {
                // If found, update the record with the new user ID in secondary
                $recordWithEmptySecondary->user_id_secondary = $id;
                $recordWithEmptySecondary->save();
            } else {
                // Check if there's a record with primary empty but secondary filled
                $recordWithEmptyPrimary = RandomQueue::whereNull('user_id_primary')
                    ->whereNotNull('user_id_secondary')
                    ->first();
        
                if ($recordWithEmptyPrimary) {
                    // If found, update the record with the new user ID in primary
                    $recordWithEmptyPrimary->user_id_primary = $id;
                    $recordWithEmptyPrimary->save();
                    $this->queue_status = 'connected';
                } else {
                    // No suitable record found, create a new record
                    RandomQueue::create([
                        'user_id_primary' => $id,
                        'user_id_secondary' => null
                    ]);
                }
            }
        } else {
            // Optional: handle case where ID already exists (not specified in the requirements)
        }
        
        // $this->match_users();
    }

    public function checkIfMatched() {
        $id = Auth::user()->id;
        $record = RandomQueue::where('user_id_primary', $id)
            ->orWhere('user_id_secondary', $id);

        if($record->exists()) {
            dd($record->toArray());
        }
    }

    public function remove_queue() {
        $id = Auth::user()->id;

        // Check if $id is in user_id_secondary
        $recordInSecondary = RandomQueue::where('user_id_secondary', $id)->first();
        if ($recordInSecondary) {
            // Set user_id_secondary to null
            $recordInSecondary->user_id_secondary = null;
            $recordInSecondary->save();
            
            // Check if both columns are null
            if (is_null($recordInSecondary->user_id_primary) && is_null($recordInSecondary->user_id_secondary)) {
                $recordInSecondary->delete();
            }
        } else {
            // Check if $id is in user_id_primary
            $recordInPrimary = RandomQueue::where('user_id_primary', $id)->first();
            if ($recordInPrimary) {
                // Set user_id_primary to null
                $recordInPrimary->user_id_primary = null;
                $recordInPrimary->save();
                
                // Check if both columns are null
                if (is_null($recordInPrimary->user_id_primary) && is_null($recordInPrimary->user_id_secondary)) {
                    $recordInPrimary->delete();
                }
            }
        }
    }

    public function send_message() {
        $id = Auth::user()->id;
        $exists = RandomQueue::where('id', $id)->exists();

        if($exists) {

        }

    }

    public function render()
    {

        

        return view('livewire.random-connection');
    }
}
