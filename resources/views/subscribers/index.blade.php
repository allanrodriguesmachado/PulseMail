<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <div class="flex items-center justify-start mb-4">
            <a href="{{ route('mail.index') }}"
               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
             Voltar
            </a>
        </div>
        {{-- Cabeçalho --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Assinantes</h1>
            <span class="text-sm text-gray-400">{{ $subscribers->count() }} registros</span>
        </div>

        {{-- Busca --}}
        <div class="relative mb-5">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input type="text" placeholder="Buscar por nome ou e-mail..."
                   class="w-full pl-9 pr-4 py-2 text-sm bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
        </div>



        <div class="space-y-2">
            <div>
            @forelse($subscribers as $subscriber)

                <div class="flex items-center gap-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-4 py-3 hover:border-gray-300 dark:hover:border-gray-600 transition-colors">

                    <span class="text-xs font-medium text-gray-400 bg-gray-100 dark:bg-gray-700 rounded-md px-2 py-1 shrink-0 w-10 text-center">
                        #{{ $subscriber->id }}
                    </span>

                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center shrink-0">
                        <span class="text-xs font-semibold text-blue-600 dark:text-blue-300">
                            {{ strtoupper(substr($subscriber->name, 0, 1)) }}
                        </span>
                    </div>

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate">{{ $subscriber->name }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ $subscriber->email }}</p>
                    </div>

                    @if($subscriber->active ?? true)
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400 shrink-0">
                            Ativo
                        </span>
                    @else
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-gray-100 text-gray-500 dark:bg-gray-700 dark:text-gray-400 shrink-0">
                            Inativo
                        </span>
                    @endif

                    {{-- Ações --}}
{{--                    <div class="flex items-center gap-1 shrink-0">--}}
{{--                        <a href="{{ route('subscribers.edit', $subscriber) }}"--}}
{{--                           class="p-1.5 rounded-lg border border-transparent hover:border-blue-200 hover:bg-blue-50 dark:hover:bg-blue-900/30 text-gray-400 hover:text-blue-600 transition-colors"--}}
{{--                           title="Editar">--}}
{{--                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>--}}
{{--                            </svg>--}}
{{--                        </a>--}}

{{--                        <form action="{{ route('subscribers.destroy', $subscriber) }}" method="POST"--}}
{{--                              onsubmit="return confirm('Excluir {{ $subscriber->name }}?')">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit"--}}
{{--                                    class="p-1.5 rounded-lg border border-transparent hover:border-red-200 hover:bg-red-50 dark:hover:bg-red-900/30 text-gray-400 hover:text-red-600 transition-colors"--}}
{{--                                    title="Excluir">--}}
{{--                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            @empty
                <div class="text-center py-12 text-gray-400">
                    <p class="text-sm">Nenhum assinante cadastrado.</p>
                </div>
            @endforelse

            {{$subscribers->links()}}
        </div>
    </div>
        >
</x-app-layout>
