<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{

    public function index(){

        $photos = Photo::all();

        return View('admin.media.index',compact('photos'));

    }

    public function create(){

        return View('admin.media.create');

    }

    public function store(Request $request){

        $files = $request->file('file');

        $name = time() . $files->getClientOriginalName();

        $files->move('image',$name);

        Photo::create(['file'=>$name]);


    }

    public function destroy($id){

        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->file);

        $photo->delete();

    }

    public function deleteMedia(Request $request)
    {

        if(isset($request->delete_single)){

            $this->destroy($request->photo_id);

            //return "its work" ;
            return redirect()->back();

        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){

            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo){
                $photo->delete();
            }

            return redirect()->back();

        }else{
            return redirect()->back();
        }

        //dd($request);

    }
}
