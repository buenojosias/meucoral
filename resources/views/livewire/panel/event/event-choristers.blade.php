<div class="space-y-4">
    @livewire('panel.event.partials.event-stats', ['event' => $event])
    @livewire('panel.event.partials.event-confirmations', ['event' => $event, 'groups' => $event->groups])
</div>
