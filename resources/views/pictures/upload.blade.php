@extends('layouts.app')

@section('title', 'Upload Picture')

@section('content')
    <div class="max-w-3xl ml-auto mr-auto">
        <div class="text-center text-2xl mb-5">Add Pictures to Checklist Item</div>
        <div class="px-2 py-1 border border-gray-700 rounded-lg overflow-hidden bg-gray-200 text-center mb-5">{{$answer->question->question}}</div>
        <div class="text-center">
            <form action="{{route('pictures.store', [$inspection->id, $answer->id])}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="user-image mb-3 text-center">
                    <div class="mx-auto my-2 max-w-sm imgPreview"> </div>
                </div>

                <div>
                    <input type="file" name="pictures[]" class="custom-file-input" id="images" multiple="multiple">
                    <label class="custom-file-label" for="images">Choose Image / Images</label>
                </div>

                <div class="row flex justify-center mt-3">
                    <i class="text-danger">When selecting pictures hold down Ctrl on Windows or Cmd on MacOS to select multiple photos.</i>
                </div>

                <div class="mt-12 row flex justify-end">
                    <a href="{{ url()->previous() }}" class="mr-4 inline-flex btn-teal-lg">Back</a>
                    <button type="submit" name="submit" class="btn-indigo-lg">
                        Upload Images
                    </button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
@stop
