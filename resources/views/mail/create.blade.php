<x-app-layout>
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <a href="{{ route('mail.index') }}"
           class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-800 dark:hover:text-gray-200 mb-5 transition-colors">
            <i class="ti ti-arrow-left text-base"></i>
            Voltar para emails
        </a>

        <div class="mb-6">
            <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">Novo email</h1>
            <p class="text-sm text-gray-500 mt-1">Preencha as informações e faça upload do arquivo HTML.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6">
            <form method="POST" action="{{ route('mail.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Título --}}
                <div class="mb-5">
                    <x-input-label for="title">Título</x-input-label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Ex: Newsletter de Maio"
                        class="mt-1 block w-full text-sm rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5 text-gray-900 focus:border-red-500 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                        required
                    />
                    <x-input-error :messages="$errors->get('title')" class="mt-1" />
                </div>

                {{-- Upload --}}
                <div class="mb-5">
                    <x-input-label for="file">Arquivo</x-input-label>
                    <div
                        class="mt-1 flex flex-col items-center justify-center gap-2 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 px-6 py-8 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors"
                        onclick="document.getElementById('file').click()"
                    >
                        <i class="ti ti-upload text-3xl text-gray-400"></i>
                        <p class="text-sm text-gray-500">Clique para selecionar ou arraste o arquivo</p>
                        <span class="text-xs text-gray-400">HTML, HTM — máx. 10MB</span>
                    </div>

                    <input
                        type="file"
                        id="file"
                        name="file"
                        accept=".html,.htm"
                        class="hidden"
                        required
                        onchange="document.getElementById('file-name').textContent = this.files[0]?.name ?? ''"
                    />

                    <p id="file-name" class="mt-2 text-sm text-gray-500 flex items-center gap-1">
                        <i class="ti ti-file text-red-600"></i>
                        <span></span>
                    </p>

                    <x-input-error :messages="$errors->get('file')" class="mt-1" />
                </div>

                <hr class="border-gray-200 dark:border-gray-700 my-5" />

                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-red-700 hover:bg-red-800 text-white text-sm font-medium rounded-lg px-5 py-2.5 transition-colors focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                    <i class="ti ti-send text-base"></i>
                    Criar Email
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
