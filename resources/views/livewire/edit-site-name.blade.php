<div>
    <button class="ml-4 px-2 py-1 bg-green-300 rounded-lg text-xs" wire:click="editSiteName({{$client_id}})">Edit Site Name</button>
    @if($showSiteEditModal)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-10/12 sm:p-6">
                    <div>
                        <form wire:submit.prevent="submit">
                            <div class="mt-3 sm:mt-5 row flex justify-center items-center">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 text-center" id="modal-title">
                                    Edit Site Name
                                </h3>
                            </div>
                            <div class="row flex justify-center space-x-3 items-center">
                                <input wire:model.lazy="updateSiteName" type="text" class="ml-4 max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" />
                                <button class="px-2 py-1 text-sm bg-green-600 text-gray-100 hover:bg-green-500 rounded-md" type="submit">Update</button>
                                <button wire:click="$set('showSiteEditModal', false)" type="button" class="px-2 py-1 text-sm bg-red-600 text-gray-100 hover:bg-red-500 rounded-md">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-5 space-y-4">

                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
