<x-app-layout>
@foreach($authors as $author)

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex" style="justify-content:center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full" style="justify-content:center">
                <h2 class="px-6 pt-4 font-semibold text-xl leading-tight text_color">
                    {{ __('Edit ') }}{{$author->name}}
                </h2>
                <form class="px-6 mb-6 w-full text_color" method="POST" action="{{ route('authors.editIt', $author->id) }}">
                    @csrf
                    
                    <div>
                        <label for="name" class="text-xs">Author Name</label><br>
                        <input type="text" name="name" id="name" value="{{$author->name}}" class="w-full">
                        @error('name')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="email" class="text-xs">Email Address</label><br>
                        <input type="email" name="email" id="email" value="{{$author->email}}" class="w-full">
                        @error('email')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="mt-4 main_color text-white btn px-2 py-1 rounded read-more">
                        {{ __('Edit Author') }}
                    </button>
                </form>
        </div>
    </div>
@endforeach
</x-app-layout>
