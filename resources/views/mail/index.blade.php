<x-app-layout>

    @unless($emails->isNotEmpty())
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}

                        <form method="POST" action="{{route('mail.store')}}" class="max-w-sm mx-auto" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                <x-input-label for="title">E-mail</x-input-label>
                                <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@example.com" required />
                            </div>

                            <div class="mb-5">
                                <x-input-label for="file">File</x-input-label>
                                <input type="file" id="file" name="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-300" required />
                            </div>

                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    @else
        @foreach($emails as $email)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                       <div class="flex flex-col justify-between md:flex-row">
                           <div class="p-6 text-gray-900 dark:text-gray-100">
                               {{ $email->id }}
                           </div>

                           <div class="p-6 text-gray-900 dark:text-gray-100">
                               {{ $email->title }}
                           </div>

                           <div class="p-6 text-gray-900 dark:text-gray-100">
                               {{ $email->subscribers()->count() }} {{__("Subscribers")}}
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endunless
</x-app-layout>
