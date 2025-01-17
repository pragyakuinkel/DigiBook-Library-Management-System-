<x-guest-layout>
    <!-- genre delete conformation -->
    <div class="p-6">
        <h2 class="text-lg font-medium dark:text-gray-100">
            {{ __('Are you sure you want to delete this genre?') }}
        </h2>

        <p class="mt-1 text-sm dark:text-gray-400">
            {{ __('Deleting this genre will permanently remove it from the system. Any books associated with this genre will no longer have this genre assigned. This action cannot be undone.') }}
        </p>

        <div class="mt-6 flex justify-end">
            <form method="post" action="{{ route('genre.delete', $id) }}">
                <a href="{{ route('genre') }}" class="main_color text-white btn px-2 py-1 rounded mb-2 read-more" type="submit" style="width:80px;height:40px;padding:6px 18px">Cancel</a>    
                @csrf
                <button class="text-white btn px-2 py-1 rounded mt-1 deleteButton " type="submit" style="width:80px;background-color:red">Delete</button>
            </form>
        </div>
    </div>
</x-guest-layout>