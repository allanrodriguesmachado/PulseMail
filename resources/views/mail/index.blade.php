<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}



                    <form method="POST" action="{{route('mail.store')}}" class="max-w-sm mx-auto" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <x-input-label for="title">E-mail</x-input-label>
                            <input type="text" id="title" name="title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="name@flowbite.com" required />
                        </div>

                        <div class="mb-5">
                            <x-input-label for="title">File</x-input-label>
                            <input type="file" id="title" name="file" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="name@flowbite.com" required />
                        </div>

                        <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
