<x-app-layout>
@foreach($authors as $author) 
    <div style="padding:2% 0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="mt-3 text_color">
                        <h2 style="font-weight:bold;font-size:30px;width:fit-content">Reviews on {{$author->name}}</h2>
                        @foreach($reviews as $review)
                            @if($review->author_id==$author->id)
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
                    </div>

                    <div class="mt-3">
                        <form action="{{ url('reviews/Authors/' . $author->id) }}" method="post">
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
@endforeach
</x-app-layout>
