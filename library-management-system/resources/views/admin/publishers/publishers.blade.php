
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="text_color flex items-center" style="justify-content:space-between;flex-wrap:wrap">
                        <h2 class="font-semibold text-xl leading-tight ml-2">
                            {{ __('Manage Publishers') }}
                        </h2>
                        
                        <a href="/addPublisher" class="main_text_color">
                            <p class="mr-2">
                                Add New Publisher   <i class="fa-solid fa-plus"></i>
                            </p>
                        </a>

                    </div>
                    <div class="table_scroll text_color">
                        <table class="w-full table mt-10 shadow-lg p-3 mb-10 box-shadow-table ">
                            <thead style="height:30px;">
                                <tr class="text-center border-b " style="height:40px">
                                    <th style="width: 20%; ; padding: 1px 2px">Publisher Name</th>
                                    <th style="width: 20%; ; padding: 1px 2px">Email</th>
                                    <th style="width: 20%; ; padding: 1px 2px">Address</th>
                                    <th style="width: 20%; ; padding: 1px 2px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($publishers as $publisher)
                                    <tr class="text-center border-b " style="height:50px">
                                        <td style="padding: 1px 2px">{{$publisher->name}}</td>
                                        <td style="padding: 1px 2px">{{$publisher->email}}</td>
                                        <td style="padding: 1px 2px">{{$publisher->address}}</td>
                                        <td>
                                            <form action="{{ route('deletePublisher', $publisher->id) }}" method="POST" class="mt-10">
                                                @csrf
                                                <button class="text-white btn px-2 py-1 rounded mt-1 deleteButton" type="submit" style="width:60px">Delete</button>
                                                <a href="{{ route('publishers.edit', $publisher->id) }}" class="main_color text-white btn px-2 py-1 rounded mb-2 read-more" type="submit" style="width:80px;height:40px;padding:6px 18px">Edit</a>    
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $publishers->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
