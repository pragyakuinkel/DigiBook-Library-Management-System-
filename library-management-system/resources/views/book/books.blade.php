<x-app-layout>
    <div style="padding:2% 0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    
                    <div class="text_color flex items-top sm:flex-wrap " style="width:100%;gap:3%;">
                        
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" style="width:20%;" >

                        <div>
                            <h2 style="font-weight:bold;font-size:50px;width:fit-content">{{$book->name}}</h2>
                            <small class="px-2 main_color" style="opacity:0.8;border-radius:3px;color:white">{{$book->availability}}</small><br>

                            @foreach($publishers as $publisher)
                                @if($book->publication==$publisher->id)
                                    <small>published by <a href="{{ route('reviews', $publisher->id) }}"><b>{{$publisher->name}}</b></a></small>
                                @endif
                            @endforeach
                            <h6 class="main_text_color" style="opacity:0.8"><b>Description</b></h6>
                            <p>
                                <b>ISBN Number: </b> {{$book->isbn}}<br>

                                <b>Authors:</b>
                                @foreach($book_author as $authorBook)
                                    @foreach($authors as $authorInfo)
                                        @if($authorBook->book_id==$book->id && $authorBook->author_id==$authorInfo->id)
                                           <a href="{{ route('authorReview', $authorInfo->id) }}">{{$authorInfo->name}}</a> 
                                        @endif
                                    @endforeach
                                @endforeach
                                <br>

                                <b>Genres: </b>
                                @foreach($book_genre as $genreBook)
                                    @foreach($genres as $genre)
                                        @if($genreBook->book_id==$book->id && $genreBook->genre_id==$genre->id)
                                            {{$genre->name}}
                                        @endif
                                    @endforeach
                                @endforeach
                                <br>
                            </p><br>
                            
                            @auth
                                @if($borrowed)
                                    <a href="{{ route('return', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-3 text-center read-more " type="submit" style="padding:6px 18px;margin-top:10px; margin-bottom:10px;width:100px">Return</a>
                                @else
                                    @if($book->availability=="Available")
                                        <a href="{{ route('borrow', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-3 text-center read-more " type="submit" style="padding:6px 18px;margin-top:10px; margin-bottom:10px;width:100px">Borrow</a>
                                    @endif
                                @endif
                            @endauth
                            
                            @guest
                                <a href="{{ route('borrow', $book->id) }}"class="main_color text-white btn px-2 py-1 rounded mt-3 text-center read-more " type="submit" style="padding:6px 18px;margin-top:10px; margin-bottom:10px;width:100px">Borrow</a>
                            @endguest
                        </div>
                    </div>

                    <div class="mt-3 text_color border-t">
                        <h2 style="font-weight:bold;font-size:30px;width:fit-content">Reviews</h2>
                        @foreach($reviews as $review)
                            @if($review->book_id==$book->id)
                                <div class="flex align-center border-b mt-1 w-full">
                                    <div>
                                        <i class="fa-solid fa-user main_text_color mr-2 mt-1"></i>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex w-full" style="justify-content:space-between;align-items:center;flex-wrap:wrap">
                                            @foreach($users as $user)
                                                @if($user->id==$review->user_id)
                                                        <small><b>{{$user->email}}</b></small>
                                                @endif
                                            @endforeach
                                            <small class="mr-2">{{$review->created_at}}</small>
                                        </div>
                                        <p>{{$review->review}}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{ $reviews->links() }}
                    </div>

                    <div class="mt-3">
                        <form action="{{ route('reviews.store', ['reviewed_area' => 'Books', 'val_id' => $book->id]) }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="review" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Review</label>
                                <textarea id="review" name="review" rows="4" 
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-900 focus:ring-blue-500 focus:border-blue-500" 
                                    placeholder="Write your review here..."></textarea>
                            </div>
    
                            <div class="text-right">
                                <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded-md main_color read-more">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
