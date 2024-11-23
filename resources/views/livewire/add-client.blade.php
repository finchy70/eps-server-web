<div>
    <form wire:submit.prevent="create">
        @csrf
        <div class="mt-12 w-1/2 mx-auto">
            <label for="client" class="block text-sm font-medium leading-5 text-gray-700">New Clients Name</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="client" wire:model="client" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('remove') <span class="text-xs text-red-600 italic">{{$message}}</span> @enderror
            </div>
            @error('client') <span class="text-xs text-red-600 italic">{{$message}}</span> @enderror

            <div class="row justify-end flex">
                <button class="mt-8 justify-end inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Add Client</button>
            </div>
        </div>
    </form>

</div>
