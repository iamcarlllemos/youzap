<div>
    
    @if($queue_status == 'waiting')
        <i class='bx bx-loader-alt bx-spin' ></i> Finding Match
        <form wire:submit="connect_random">
            <button type="submit">Stop</button>
        </form> 
    @elseif($queue_status == 'connected')
        @dd($data);
    @else
        <form wire:submit="connect_random">
            <input type="text" name="name" id="name" wire:model="name">
            <button type="submit">Start</button>
        </form> 
    @endif

    <!-- <form wire:submit="send_message" class="mt-5">
        <textarea name="message" id="message" class="form-control"></textarea>
        <button type="submit" class="mt-3">Send</button>
    </form> -->
</div>

