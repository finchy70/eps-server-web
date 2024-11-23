<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Inspection;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PictureController extends Controller
{
    public function show($id, Picture $picture){
        return view('pictures.show', compact('id','picture'));
    }

    public function edit_comment(Picture $picture,  Inspection $inspection)
    {
        return view('pictures.update_comment', compact('picture', 'inspection'));
    }

    public function update_comment(Request $request, Picture $picture, Inspection $inspection)
    {
        $picture->comments = $request->comments;
        $picture->update();
        $element = $picture->id;
        return redirect()->route('inspections.show', [$inspection->id, '#picture-'.$element]);

    }

    public function upload($id, Answer $answer)
    {
        $inspection = Inspection::find($id);
        return view('pictures.upload', compact('inspection', 'answer'));

    }

    public function store(Inspection $inspection, Answer $answer){

        $this->validate(request(), [
            'pictures' => 'required|array'
        ]);

//        $imageRules = array(
//            'img' => 'img|max:2000'
//        );

//        foreach(request('pictures') as $image)
//        {
//            $image = array('img' => $image);
//
//            $imageValidator = Validator::make($image, $imageRules);
//
//            if ($imageValidator->fails()) {
//
//                $messages = $imageValidator->messages();
//
//                return Redirect::to('venue-add')
//                    ->withErrors($messages);
//
//            }
//        }

        foreach(request('pictures') as $each_picture){
            $original_picture = $each_picture;
            $picture = Image::make($original_picture);

            $original_file_name = $original_picture->getClientOriginalName();

            $file_no_extension = pathinfo($original_file_name, PATHINFO_FILENAME);
            $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);

            $file_name = Str::slug($file_no_extension);
            $full_file_name = $file_name.'-'.strtotime(now()).'.'.$file_extension;

            //Create large version
            $big_picture = $picture;
            $big_picture->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('img/'.$full_file_name, $big_picture->encode());
//            $big_picture->save($originalPath.$time.$full_file_name);

            //Create thumbnail
            $thumb_picture = $picture;
            $thumb_picture->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('thumb/'.$full_file_name, $big_picture->encode());
//            $thumb_picture->save($thumbnailPath.$time.$full_file_name);


            $picture = new Picture();
            $picture->inspection_id = $inspection->id;
            $picture->filename = $full_file_name;
            $picture->answer_id = $answer->id;
            $picture->comments = "";
            $picture->save();
        }

        $element = $picture->id;

        return redirect()->route('inspections.show', [$inspection->id, '#picture-'.$element]);
    }

    public function delete(Picture $picture){
        Storage::delete('img/'.$picture->filename);
        Storage::delete('thumb/'.$picture->filename);
        $picture->delete();
        return redirect()->back();
    }
}
