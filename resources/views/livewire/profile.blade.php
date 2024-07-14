@php

$last_seen = Auth::user()->last_seen;

@endphp

<div>
    <div class="card mb-3">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body" wire:poll>
            <ul>
                <li>Name: {{Auth::user()->fullname}}</li>
                <li>Email: {{Auth::user()->email}}</li>
                <li>Status: </li>
            </ul>

        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Other Users
        </div>
        <div class="card-body" wire:poll>
            {{saveLastSeen()}}
             @forelse($data as $items)
                <div class="mb-3">
                    <p>{{$items->fullname}} <span>{{UserState($items->last_seen)}}</span></p>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</div>