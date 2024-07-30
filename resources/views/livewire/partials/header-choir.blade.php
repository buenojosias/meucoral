<div>
    @if ($choirId && !request()->routeIs(['*home*', '*choirs*']))
        <div class="page-title">
            {{ $choirName }}
        </div>
    @endif
</div>
