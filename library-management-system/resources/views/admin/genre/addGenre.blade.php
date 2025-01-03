<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex" style="justify-content:center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full" style="justify-content:center">
                <h2 class="px-6 pt-4 font-semibold text-xl leading-tight text_color">
                    {{ __('Add New Genre') }}
                </h2>
                <form class="px-6 mb-6 w-full text_color" method="POST" action="{{ route('addGenre.store') }}">
                    @csrf
                    
                    <div>
                        <label for="name" class="text-xs">Genre Name:</label><br>
                        <input type="text" name="name" id="name" placeholder="Name" class="w-full">
                        @error('name')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="mt-4 main_color text-white btn px-2 py-1 rounded read-more">
                        {{ __('Add Genre') }}
                    </button>
                </form>
        </div>
    </div>
</x-app-layout>
