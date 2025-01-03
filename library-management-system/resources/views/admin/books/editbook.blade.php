<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex" style="justify-content:center">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full" style="justify-content:center">
                <h2 class="px-6 pt-4 font-semibold text-xl leading-tight text_color">
                    {{ __('Edit ') }}{{ $book->name }}
                </h2>

                <form class="px-6 mb-6 w-full text_color" method="POST" action="{{ route('editbook.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="name" class="text-xs">Book Name</label><br>
                        <input type="text" name="name" id="name" value="{{ $book->name }}" class="w-full">
                        @error('name')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="publication_year" class="text-xs">Publication Year</label><br>
                        <input type="date" name="publication_year" id="publication_year" value="{{ $book->publication_year }}" class="w-full">
                        @error('publication_year')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="isbn" class="text-xs">ISBN Number</label><br>
                        <input type="text" name="isbn" id="isbn" value="{{ $book->isbn }}" class="w-full">
                        @error('isbn')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="image" class="text-xs">Book Image</label><br>
                        <input type="file" name="image" class="form-control" value="{{$book->image}}">
                        @error('image')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-1">
                        <label for="publication" class="text-xs">Publisher</label><br>
                        <select name="publication" id="publication" class="form-select w-full">
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publication ? 'selected' : '' }}>
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-1">
                        <label for="authors" class="text-xs">Authors:</label>
                        <select name="authors[]" multiple required class="form-select w-full h-2" >
                            @foreach($authors as $authorInfo)
                                <?php
                                    $selectOrNot=false;
                                    
                                        foreach($book_author as $authorBook){
                                        if($authorBook->book_id==$book->id && $authorBook->author_id==$authorInfo->id){
                                            $selectOrNot=true;
                                            break;
                                        }
                                    }
                                ?>
                                    @if($selectOrNot)
                                        <option value="{{ $authorInfo->id }}" selected>
                                            {{$authorInfo->name}}         
                                        </option>
                                    @else
                                        <option value="{{ $authorInfo->id }}">
                                            {{ $authorInfo->name }}
                                        </option>
                                    @endif
                            @endforeach
                        </select>
                        <small class="text-gray-500">Hold down Ctrl (Cmd on Mac) to select multiple genres.</small>
                    </div>

                    <div class="mt-1">
                        <label for="genres" class="text-xs">Genres:</label>
                        <select name="genres[]" multiple class="form-select w-full">
                            @foreach($genres as $genre)   
                                <?php
                                    $selectOrNot=false;
                                    foreach($book_genre as $genreBook){
                                        if($genreBook->book_id==$book->id && $genreBook->genre_id==$genre->id){
                                            $selectOrNot=true;
                                            break;
                                        }
                                    }
                                ?>
                                    @if($selectOrNot)
                                        <option value="{{ $genre->id }}" selected>
                                            {{$genre->name}}         
                                        </option>
                                    @else
                                        <option value="{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </option>
                                    @endif
                            @endforeach
                        </select>
                        <small class="text-gray-500">Hold down Ctrl (Cmd on Mac) to select multiple genres.</small>
                    </div>

                    <div class="mt-1">
                        <label for="copy" class="text-xs">Available Copy:</label>
                        <input type="number" name="copy" id="copy" value="{{ $book->available_copy }}" class="w-full">
                        @error('copy')
                            <div style="color:red">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="mt-4 main_color text-white btn px-2 py-1 rounded read-more">
                        {{ __('Edit Book') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
