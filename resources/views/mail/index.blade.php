<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex items-center justify-between gap-4 flex-wrap mb-6">
            <div class="relative flex-1 min-w-[200px] max-w-sm">
                <i class="ti ti-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <form action="{{ route('mail.index') }}" method="GET">
                    <input
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Buscar por título ou ID..."
                        class="w-full pl-9 pr-3 py-2 text-sm border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-600 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                </form>
            </div>

            <a href="{{ route('mail.create') }}"
               class="flex items-center gap-2 bg-red-700 hover:bg-red-800 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                <i class="ti ti-plus"></i>
                Criar Email
            </a>
        </div>

        @if($emails->isNotEmpty())
            <p class="text-sm text-gray-400 mb-3">{{ $emails->total() }} emails encontrados</p>

            <div class="flex flex-col gap-2">
                @foreach($emails as $email)
                    <div class="flex items-center gap-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl px-5 py-4 hover:border-gray-300 transition-colors">

                        <span class="text-xs font-medium text-gray-400 bg-gray-100 dark:bg-gray-700 rounded-md px-2 py-1 shrink-0">
                            #{{ $email->id }}
                        </span>

                        <span class="flex-1 text-sm font-medium text-gray-900 dark:text-gray-100 truncate">
                            {{ $email->title }}
                        </span>

                        <span class="flex items-center gap-1 text-sm text-gray-500 shrink-0">
                            <i class="ti ti-users text-base"></i>
                            {{ $email->subscribers_count }} {{ __('Subscribers') }}
                        </span>

                        <div class="flex gap-2 shrink-0">
                            <a href=""
                               class="p-1.5 border border-gray-200 dark:border-gray-600 rounded-lg text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <i class="ti ti-edit text-base"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $emails->links() }}
            </div>

        @else
            <div class="flex flex-col items-center justify-center gap-3 py-20 text-gray-400">
                <i class="ti ti-mail text-4xl"></i>
                <p class="text-sm">Nenhum email encontrado.</p>
                <a href="{{ route('mail.create') }}" class="text-sm text-red-600 hover:underline">Criar o primeiro</a>
            </div>
        @endif

    </div>
</x-app-layout>
