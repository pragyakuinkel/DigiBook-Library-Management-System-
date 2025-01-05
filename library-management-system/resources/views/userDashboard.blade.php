<x-app-layout>
    <img src="{{ asset('images/books/header_image.jpg') }}" alt="header" style="width:100%;height:auto">

    <div style="padding:2% 0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text_color flex items-center" style="justify-content:space-between;flex-wrap:wrap">
                        <h2 class="font-semibold text-xl eading-tight text_color ml-2">
                            {{ __('Recently Added') }}
                        </h2>
                    </div>
                    <div class="card-group flex text_color mb-4 " style="flex-wrap:wrap;border-radius: 15px;justify-content:start">
                        @foreach($books as $book)
                            <div class="flex flex-col book" style="transition: all 0.3s ease;align-items:center;max-width:20%;min-width:150px;margin:10px">
                                <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" style="border-radius: 5px;width:90%;margin-top:10px" >
                                <h5 style="font-weight:bold;font-size:20px;margin:0 10px">{{$book->name}}</h5>
                                <p style="margin:0 10px">by <b>
                                    @foreach($book_author as $authorBook)
                                        @foreach($authors as $authorInfo)
                                            @if($authorBook->book_id == $book->id && $authorBook->author_id == $authorInfo->id)
                                                {{$authorInfo->name}}<br>
                                            @endif
                                        @endforeach
                                    @endforeach</b>
                                </p>
                                    
                                <a href="{{ route('book', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-1 text-center read-more " type="submit" style="padding:6px 18px;margin-top:auto; margin-bottom:10px;width:90%">Read More</a>
                            </div>
                        @endforeach
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
