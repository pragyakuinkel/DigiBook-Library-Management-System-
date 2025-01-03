<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text_main">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text_color flex items-center" style="justify-content:space-between;flex-wrap:wrap">
                        <h2 class="font-semibold text-xl eading-tight text_color ml-2">
                            {{ __('Manage Books') }}
                        </h2>
                        <a href="/addBook"  class="main_text_color">
                            <p class="mr-2">
                                Add New Book
                                <i class="fa-solid fa-plus"></i>
                            </p>
                        </a>
                    </div>
                    <div class="table_scroll">
                        <table class="w-full table mt-10 shadow-lg p-3 mb-10 box-shadow-table text_color ">
                            <thead style="height:30px;">
                                <tr class="text-center border-b " style="height:40px">
                                    <th>Book</th>
                                    <th>ISBN</th>
                                    <th>Publisher</th>
                                    <th>Author</th>
                                    <th>Genre</th>
                                    <th>Availability</th>
                                    <th>Available Copy</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($books as $book)
                                    <tr class="text-center border-b " style="height:50px">
                                        <td style=" padding: 1px 2px">{{$book->name}}</td>
                                        <td style=" padding: 1px 2px">{{$book->isbn}}</td>
                                        @foreach($publishers as $publisher)
                                            @if($book->publication==$publisher->id)
                                                <td style=" padding: 1px 2px">{{$publisher->name}}</td>
                                            @endif
                                        @endforeach
                                        <td style=" padding: 1px 2px">
                                            @foreach($book_author as $authorBook)
                                                @foreach($authors as $authorInfo)
                                                    @if($authorBook->book_id==$book->id && $authorBook->author_id==$authorInfo->id)
                                                        {{$authorInfo->name}}</br>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td style=" padding: 1px 2px">
                                            @foreach($book_genre as $genreBook)
                                                @foreach($genres as $genre)
                                                    @if($genreBook->book_id==$book->id && $genreBook->genre_id==$genre->id)
                                                        {{$genre->name}}</br>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td style=" padding: 1px 2px">{{$book->availability}}</td>
                                        <td style=" padding: 1px 2px">{{$book->available_copy}}</td>
                                        <td>
                                            <form action="{{ route('deleteBook', $book->id) }}" method="POST" class="mt-10">
                                                @csrf
                                                <button class="text-white btn px-2 py-1 rounded mt-1 deleteButton" type="submit" style="width:60px">Delete</button>
                                                <a href="{{ route('editBook', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mb-2 read-more" type="submit" style="width:80px;height:40px;padding:6px 18px;margin-top-10px">Edit</a>    
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
