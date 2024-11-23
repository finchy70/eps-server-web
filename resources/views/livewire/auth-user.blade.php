<div>
    <div class="bg-gray-100 shadow overflow-hidden sm:rounded-md mb-4">
        <ul class="divide-y divide-gray-200">
            <li>
                <form wire:submit.prevent="authorise">
                    <div class="flex items-center px-4 py-4 sm:px-6">
                        <div class="min-w-0 flex-1 flex items-center">
                            <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                <div>
                                    <p class="text-sm font-medium text-indigo-600 truncate">{{$user->name}}</p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                        <!-- Heroicon name: mail -->
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                        </svg>
                                        <span class="truncate">{{$user->email}}</span>
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-900">
                                        Applied on
                                        <time>{{$user->formatted_created_at}}</time>
                                    </p>
                                    <p>
                                        <div>
                                            <select wire:model="selected_client" id="selected_client{{$user->id}}" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                <option value="1000" selected>Engineer</option>
                                                <option value="2000">Admin</option>
                                                @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{$client->client}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div>
                            <!-- Heroicon name: chevron-right -->
                            <button type="submit" class="mt-8 justify-end inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                Authorise
                            </button>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
</div>
