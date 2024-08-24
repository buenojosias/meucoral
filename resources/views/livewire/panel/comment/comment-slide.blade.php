<div>

    <div class="fixed right-0 bottom-8 sm:bottom-auto sm:top-24 w-auto h-auto rounded-l bg-secondary-400 shadow-lg cursor-pointer"
        x-on:click="$slideOpen('slide-comments')">
        <x-ts-icon name="chat-centered-text" class="m-2 h-6 sm:h-7 text-white" />
    </div>

    <x-ts-slide title="Comentários" x-on:open="$wire.loadComments" id="slide-comments" persistent>
        <div class="h-full flex flex-col justify-between gap-y-6" x-data="{ showtextarea: false }">
            <div>
                <div class="space-y-2 mb-6" x-show="showtextarea" x-collapse>
                    <x-ts-textarea placeholder="Adicionar comentário" wire:model="form.content" />
                    <div class="flex justify-end gap-2">
                        <x-ts-button text="Cancelar" x-on:click="showtextarea = false" wire:click="clear" flat />
                        <x-ts-button text="Salvar" wire:click="submit" />
                    </div>
                </div>
                <div class="space-y-2">
                    @foreach ($comments as $comment)
                        <div class="p-3 bg-gray-100 rounded border border-gray-150">
                            <h4 class="flex justify-between">
                                <span class="text-sm font-semibold text-gray-800">
                                    {{ $comment->chorister->name ?? '' }}
                                </span>
                                <span
                                    class="text-xs text-gray-600">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                            </h4>
                            <p class="text-md">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <x-ts-button text="Adicionar comentário" x-on:click="showtextarea = true" />
            </div>
        </div>
    </x-ts-slide>
</div>
