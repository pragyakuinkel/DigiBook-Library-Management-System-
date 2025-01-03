<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- header  -->
                    <div class="main_text_color flex items-center" style="justify-content:space-between;flex-wrap:wrap">
                        <h2 class="font-semibold text-xl leading-tight text_color ml-2">
                            {{ __('Manage Genre') }}
                        </h2>
                        <a href="/addGenre">
                            <p class="mr-2">
                                Add New Genre    <i class="fa-solid fa-plus"></i>
                            </p>
                        </a>
                    </div>
                    
                    <!-- genre table -->
                    <div class="table_scroll text_color">
                        <table class="w-full table mt-10 shadow-lg p-3 mb-10 box-shadow-table rounded">
                            <thead style="height:30px;">
                                <tr class="text-center border-b " style="height:40px">
                                    <th style="width: 35%; padding: 1px 2px">Genre Name</th>
                                    <th style="width: 20%; padding: 1px 2px">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($genres as $genre)
                                    <tr class="text-center border-b hover:bg-gray-100" style="height:50px">
                                        <td style="padding: 1px 2px">{{$genre->name}}</td>
                                        <td class="text-center">
                                            <form action="{{route('deleteGenre', $genre->id)}}" method="POST" class="mt-10">
                                                @csrf
                                                <button class="text-white btn px-2 py-1 rounded mt-1 deleteButton" type="submit" style="width:60px">Delete</button>
                                                <a href="{{ route('genre.edit', $genre->id) }}" class="main_color text-white btn px-2 py-1 rounded mb-2 read-more" type="submit" style="width:80px;height:40px;padding:6px 18px">Edit</a>    
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- paginate page next page -->
                    {{ $genres->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
