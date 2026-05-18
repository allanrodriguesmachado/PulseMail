<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-6">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-12">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-1 h-8 bg-gradient-to-b from-blue-400 to-cyan-400"></div>
                    <h1 class="text-4xl font-bold text-white">Editar Subscriber</h1>
                </div>
                <p class="text-slate-400">Atualize as informações do seu subscriber</p>
            </div>

            <!-- Form Card -->
            <div class="bg-slate-800/50 backdrop-blur-md border border-slate-700/50 rounded-2xl p-8 shadow-2xl">
                <form action="{{ route('mail.subscribers.update', $subscriber) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="mb-8">
                        <label for="name" class="block text-sm font-semibold text-slate-200 mb-3">
                            Nome Completo
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ $subscriber->name }}"
                            required
                            class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-lg text-white placeholder-slate-400 focus:outline-none focus:border-blue-400 focus:ring-2 focus:ring-blue-400/20 transition-all duration-200"
                            placeholder="Digite o nome"
                        >
                        @error('name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 pt-4">
                        <button
                            type="submit"
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-semibold rounded-lg hover:from-blue-600 hover:to-cyan-600 transition-all duration-200 shadow-lg hover:shadow-blue-500/50"
                        >
                            Atualizar
                        </button>
                        <a
                            href="{{ route('mail.index') }}"
                            class="flex-1 px-6 py-3 bg-slate-700 text-slate-200 font-semibold rounded-lg hover:bg-slate-600 transition-all duration-200 text-center"
                        >
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>

            <!-- Info Box -->
            <div class="mt-8 p-4 bg-blue-900/20 border border-blue-800/30 rounded-lg">
                <p class="text-blue-300 text-sm">
                    💡 Dica: Todas as alterações são salvas instantaneamente. Você pode voltar à lista a qualquer momento.
                </p>
            </div>
        </div>
    </div>

    <style>
        input:focus {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.1);
        }
    </style>
</x-app-layout>
