<x-guest-layout>
    <!-- genre delete conformation -->
    <div class="p-6">
        <h2 class="text-lg font-medium dark:text-gray-100">
            {{ __('Are you sure you want to delete this book?') }}
        </h2>

        <p class="mt-1 text-sm dark:text-gray-400">
            {{ __('Deleting this book will permanently remove it from the system. Any user associated with this book will no longer have this book assigned. This action cannot be undone.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <form method="post" action="{{ route('books.delete', $id) }}">
                <a href="{{ route('manage_books') }}" class="main_color text-white btn px-2 py-1 rounded mb-2 read-more" type="submit" style="width:80px;height:40px;padding:6px 18px">Cancel</a>    
                @csrf
                <button class="text-white btn px-2 py-1 rounded mt-1 deleteButton " type="submit" style="width:80px;background-color:red">Delete</button>
            </form>
        </div>
    </div>
</x-guest-layout>