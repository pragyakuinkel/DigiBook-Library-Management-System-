
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text_color flex items-center" style="justify-content:space-between;flex-wrap:wrap">
                        <h2 class="font-semibold text-xl leading-tight text_color ml-2">
                            {{ __('Manage Authors') }}
                        </h2>
                        <a href="/addAuthor" class="main_text_color">
                            <p class="mr-2">
                            Add New Author    <i class="fa-solid fa-plus"></i>
                            </p>
                        </a>
                    </div>
                    <div class="table_scroll text_color">
                        <table class="table mt-10 shadow-lg p-3 mb-10 box-shadow-table ">
                            <thead style="height:30px;">
                                <tr class="text-center border-b " style="height:40px">
                                    <th>Author Name</th>
                                    <th>Email</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($authors as $author)
                                    <tr class="text-center border-b " style="height:50px">
                                        <td>{{$author->name}}</td>
                                        <td>{{$author->email}}</td>
                                        <td class="text-center">
                                            <form action="{{route('deleteAuthor', $author->id)}}" method="POST" class="mt-10">
                                                @csrf
                                                <button class="text-white btn px-2 py-1 rounded mt-1 deleteButton " type="submit" style="width:60px">Delete</button>
                                                <a href="{{ route('authors.edit', $author->id) }}" class="main_color text-white btn px-2 py-1 rounded mb-2 read-more" type="submit" style="width:80px;height:40px;padding:6px 18px">Edit</a>    
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
