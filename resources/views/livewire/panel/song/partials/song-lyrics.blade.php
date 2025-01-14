<x-ts-card header="Letra">
    <x-ts-errors class="mb-4" />
    <div x-data="{ show_textarea: @entangle('editing') }">
        <div x-show="!show_textarea">
            @if ($song->lyrics)
                {!! $song->lyrics->content !!}
            @else
                <p>Nenhuma letra adicionada</p>
            @endif
        </div>
        <div x-show="show_textarea">
            <div wire:ignore>
                <textarea wire:model="form.content" class="min-h-fit h-48 " name="content" id="content"></textarea>
            </div>
        </div>
        <x-slot:footer>
            @if ($editing)
                <x-ts-button text="Cancelar" wire:click="toggleForm(false)" flat />
                <x-ts-button text="Salvar" wire:click="submit" />
            @else
                <x-ts-button wire:click="toggleForm(true)" :text="$song->lyrics ? 'Editar letra' : 'Adicionar letra'" flat />
                {{-- <x-ts-button text="Editar letra" :href="route('panel.songs.edit', $song)" wire:navigate flat /> --}}
            @endif
        </x-slot>
    </div>
</x-ts-card>
{{-- @script --}}
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        // forced_root_block: false,
        menubar: false,
        statusbar: false,
        toolbar: 'undo redo | bold italic underline',
        content_style: "p { margin: 0; }",
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
            editor.on('change', function(e) {
                @this.set('form.content', editor.getContent());
            });
        }
    });
</script>
{{-- @endscript --}}
