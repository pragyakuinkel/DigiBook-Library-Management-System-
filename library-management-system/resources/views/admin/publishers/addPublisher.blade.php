<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex" style="justify-content:center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width:75%; justify-content:center">
                <h2 class="px-6 pt-4 font-semibold text-xl leading-tight text_color">
                    {{ __('Add New Publisher') }}
                </h2>
                <form class="p-6 w-full text_color" method="POST" action="{{ route('addPublisher.store') }}">
                    @csrf
                    
                    <div>
                        <label for="name" class="text-xs">Publisher Name</label><br>
                        <input type="text" name="name" id="name" placeholder="Name" class="w-full">
                        @error('name')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="email" class="text-xs">Email Address</label><br>
                        <input type="email" name="email" id="email" placeholder="Email" class="w-full">
                        @error('email')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="address" class="text-xs">Address</label><br>
                        <input type="text" name="address" id="address" placeholder="Address" class="w-full">
                    </div>

                    <button class="mt-4 main_color text-white btn w-full px-2 py-1 rounded read-more">
                        {{ __('Add Publisher') }}
                    </button>

                </form>
        </div>
    </div>
</x-app-layout>
