<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="font-semibold text-xl leading-tight text_color ml-2">
                        {{ __('Not Returned Books') }}
                    </h2>

                    <div class="table_scroll text_color border-t">
                        <table class="table mt-10 shadow-lg p-3 mb-10 box-shadow-table ">
                            <thead style="height:30px;">
                                <tr class="text-center border-b " style="height:40px">
                                    <th>S.No.</th>
                                    <th>Book</th>
                                    <th>User</th>
                                    <th>Borrowed Date</th>
                                    <th>Returned Date</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($borrows as $borrower)
                                    @if($borrower->returned_at==null)
                                        <tr class="text-center border-b " style="height:50px">
                                            <td>{{$borrower->id}}</td>

                                            @foreach($books as $book)
                                                @if($book->id==$borrower->book_id)
                                                    <td>{{$book->name}}</td>
                                                @endif
                                            @endforeach

                                            @foreach($users as $user)
                                                @if($user->id==$borrower->user_id)
                                                    <td><a href="{{route('userInfo', $user->id)}}">{{$user->name}}</a></td>
                                                @endif
                                            @endforeach

                                            <td>{{$borrower->borrowed_at}}</td>

                                            <td>{{$borrower->returned_at}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $borrows->links() }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="font-semibold text-xl leading-tight text_color ml-2">
                        {{ __('Returned Books') }}
                    </h2>

                    <div class="table_scroll text_color border-t">
                        <table class="table mt-10 shadow-lg p-3 mb-10 box-shadow-table ">
                            <thead style="height:30px;">
                                <tr class="text-center border-b " style="height:40px">
                                    <th>S.No.</th>
                                    <th>Book</th>
                                    <th>User</th>
                                    <th>Borrowed Date</th>
                                    <th>Returned Date</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($borrows as $borrower)
                                    @if($borrower->returned_at!=null)
                                        <tr class="text-center border-b " style="height:50px">
                                            <td>{{$borrower->id}}</td>

                                            @foreach($books as $book)
                                                @if($book->id==$borrower->book_id)
                                                    <td>{{$book->name}}</td>
                                                @endif
                                            @endforeach

                                            @foreach($users as $user)
                                                @if($user->id==$borrower->user_id)
                                                    <td><a href="{{route('userInfo', $user->id)}}">{{$user->name}}</a></td>
                                                @endif
                                            @endforeach

                                            <td>{{$borrower->borrowed_at}}</td>

                                            <td>{{$borrower->returned_at}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $borrows->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
