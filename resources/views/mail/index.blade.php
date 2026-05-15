<x-app-layout>
    @unless($emails->isNotEmpty())
        <div class="mb-5 flex items-center justify-end">
            <a href="{{route('mail.create')}}" class="w-min text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">+</a>
        </div>
    @else
        @foreach($emails as $email)
            <div class="py-12">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                   <div class="mb-5 flex items-center justify-end">
                       <a href="{{route('mail.create')}}" class="w-min text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">+</a>
                   </div>
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
