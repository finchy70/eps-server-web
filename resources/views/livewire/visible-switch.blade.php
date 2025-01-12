<div class="flex justify-end items-center text-xs">
    <span x-data="{ on: {{ $visible ?? 'true','false'}} }">
        <span wire:click="toggleVisible" role="checkbox" tabindex="0" @click="on = !on" @keydown.space.prevent="on = !on" :aria-checked="on.toString()" aria-checked="false" :class="{ 'bg-gray-300': !on, 'bg-indigo-600': on }" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline bg-gray-200">
            <span aria-hidden="true" :class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="relative inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200 translate-x-0">
                <span :class="{ 'opacity-0 ease-out duration-100': on, 'opacity-100 ease-in duration-200': !on }" class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-100 ease-in duration-200">
                    <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                        <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
                <span :class="{ 'opacity-100 ease-in duration-200': on, 'opacity-0 ease-out duration-100': !on }" class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity opacity-0 ease-out duration-100">
                    <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
                        <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"></path>
                    </svg>
                </span>
            </span>
        </span>
    </span>
</div>

