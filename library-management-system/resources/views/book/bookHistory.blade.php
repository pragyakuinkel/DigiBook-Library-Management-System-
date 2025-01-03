<x-app-layout>
    <div style="padding:2% 0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> 
                    <div class="p-6 main_text">
                        <h4 class="font-semibold eading-tight text_color ml-3 mt-2 ">Borrowed Books</h4>
                        <div class="card-group flex text_color mb-4 border-b" style="flex-wrap:wrap;border-radius: 15px;justify-content:center">
                            @foreach($books as $book)
                                @foreach($borrowed as $borrow)
                                    @if($book->id==$borrow->book_id&&$borrow->returned_at==null)
                                        <div class="flex flex-col book" style="transition: all 0.3s ease;align-items:center;max-width:20%;min-width:150px;margin:5px 10px">
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

                                            <div class="flex flex-col w-full" style="margin-top:auto;margin-left:10%">
                                                <a href="{{ route('return', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-1 text-center read-more " type="submit" style="padding:6px 18px;margin-top:auto; margin-bottom:10px;width:90%">Return</a>
                                                <a href="{{ route('book', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-1 text-center read-more " type="submit" style="padding:6px 18px;margin-top:auto; margin-bottom:10px;width:90%">Read more</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        {{ $books->links() }}

                        <h4 class="font-semibold eading-tight text_color ml-3 mt-2 border-t">Returned Books</h4>
                        <div class="card-group flex text_color mb-4 border-b" style="flex-wrap:wrap;border-radius: 15px;justify-content:center">
                            @foreach($books as $book)
                                @foreach($borrowed as $borrow)
                                    @if($book->id==$borrow->book_id&&$borrow->returned_at!=null)
                                        <div class="flex flex-col book" style="transition: all 0.3s ease;align-items:center;max-width:20%;min-width:150px;margin:5px 10px">
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

                                            <div class="flex flex-col w-full" style="margin-top:auto;margin-left:10%">
                                                <a href="{{ route('borrow', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-1 text-center read-more " type="submit" style="padding:6px 18px;margin-top:auto; margin-bottom:10px;width:90%">Borrow Again</a>
                                                <a href="{{ route('book', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-1 text-center read-more " type="submit" style="padding:6px 18px;margin-top:auto; margin-bottom:10px;width:90%">Read more</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
