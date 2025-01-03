<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="text_color flex items-center" style="justify-content:space-between;flex-wrap:wrap">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text_color">
                            {{Auth::user()->name}} {{ __(' Info') }}
                        </h2>
                        <div class="text_color flex items-center" style="justify-content:end">
                            <a href="/borrowers">
                                <p class="mr-2">
                                    <i class="fa-solid fa-arrow-left mr-2"></i>
                                    Go back
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="w-full overflow-x-auto text_color">
                        <ol>
                            <li>UserId: {{Auth::user()->id}}</li>
                            <li>Name: {{Auth::user()->name}}</li>
                            <li>Email: {{Auth::user()->email}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
