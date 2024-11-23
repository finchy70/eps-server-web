<div>
    <div>
        <div class="row flex justify-center">
            <div class="mt-4 mb-2 text-4xl text-indigo-600 font-bold">Section Setup</div>
        </div>
        <div class="row flex justify-center">
            <div class="mt-2 mb-4 text-sm text-indigo-600 font-bold">Drag and Drop Sections into the desired order.</div>
        </div>
        <div class="mx-auto mb-4 max-w-2xl bg-white shadow overflow-hidden sm:rounded-md">
            <ul wire:sortable="updateSectionOrder" class="divide-y divide-gray-200">
                @foreach($sections as $section)
                    <li wire:sortable.item="{{ $section->id }}" wire:key="section-{{ $section->id }}">
                        <div class="block hover:bg-gray-200">
                            <div class="row flex justify-between">
                                <div wire:sortable.handle class="px-4 py-4 flex items-center sm:px-6">
                                    <div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
                                        <div>
                                            <div class="flex text-xs md:text-xl font-medium text-gray-700 truncate">
                                                <p>{{$section->order}} - {{$section->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="return confirm('Are you sure you want to delete {{$section->name}}?') || event.stopImmediatePropagation()" wire:click="removeSection({{$section->id}})" class="my-4 mr-2 text-xs btn-red">Remove</button>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
        <div class="row flex justify-center">
            <div class="mt-2 mb-4 text-sm text-indigo-600 font-bold">Add New Section</div>
        </div>
        <div class="p-4 mt-4 mx-auto max-w-2xl bg-white shadow overflow-hidden sm:rounded-md">
            <div>
                <form wire:submit.prevent="addSection">
                    <label for="email" class="block text-sm font-medium text-gray-700">Section Title</label>
                    <div class="mt-1">
                        <input wire:model.lazy="name" type="text" required name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('name') <span class="text-xs text-red-600 italic">{{$message}}</span> @enderror
                    <div class="row flex justify-end">
                        <a href="{{route('setup')}}" class="mr-4 mt-2 btn-yellow">Back</a>
                        <button class="mt-2 btn-indigo">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div x-data="{ show: false }" @set-show.window="show = true; setTimeout(() => show = false, 5000)" class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
        <div x-show="show" x-description="Notification panel, show/hide based on alert state." x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-sm font-medium text-red-900">
                            You can't delete this section as it has answers stored for some of it's questions!
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button @click="show = false" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
