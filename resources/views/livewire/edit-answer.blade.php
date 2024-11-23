<div>
    <div class="mx-auto max-w-3xl">
        <form class="space-y-8 divide-y divide-gray-200" wire:submit.prevent="update">
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{$answer->question->question}}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Here you can edit the existing answer.
                        </p>
                    </div>

                    <div class="mb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="acceptable" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Check Outcome
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="acceptable" wire:model="acceptable" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option value="Do Not Include" {{($acceptable = "Do Not Include")?'selected':''}}>Do Not Include</option>
                                <option value="Acceptable" {{($acceptable = "Acceptable")?'selected':''}}>Acceptable</option>
                                <option value="Not Acceptable" {{($acceptable = "Not Acceptable")?'selected':''}}>Not Acceptable</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="acceptable" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Remedial Action Type
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select wire:change="check" wire:model="remedialType" id="remedialType" name="remedialType" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option value="No Action" {{($remedialType = "OK")?'selected':''}}>No Action</option>
                                <option value="Recommended" {{($remedialType = "Recommended")?'selected':''}}>Recommended</option>
                                <option value="Monitor" {{($remedialType = "Monitor")?'selected':''}}>Monitor</option>
                                <option value="Immediate Action" {{($remedialType = "Immediate Action")?'selected':''}}>Immediate Action</option>
                            </select>
                        </div>
                    </div>
                    @if($showRemedialComment)
                        <div class="mb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="remedialComment" name="remedialComment" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Remedial Action Required
                            </label>

                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <textarea wire:model.lazy="remedialComment" id="remedialComment" name="remedialComment" rows="2" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">{{$remedialComment}}</textarea>
                            </div>

                        </div>
                    @endif

                    <div class="mb-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="comment" name="comment" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            General Comments
                        </label>

                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <textarea wire:model.lazy="comment" id="comment" name="comment" rows="2" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">{{$answer->comment}}</textarea>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row flex justify-end">
                <button type="button" onclick="return confirm('Are you sure you want to remove this check?  THIS CAN\'T BE UNDONE') || event.stopImmediatePropagation()" wire:click="removeCheck({{$answer->id}})" class="mt-8 inline-flex justify-center btn-red">Remove from Check</button>
                <a href="{{route('inspections.show', [$answer->inspection->id, '#answer-'.$answer->id])}}" class="ml-4 mt-8 inline-flex justify-center btn-teal">Back</a>
                <button type="submit" class="ml-4 mt-8 inline-flex justify-center btn-indigo">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
