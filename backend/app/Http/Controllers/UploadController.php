<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filetoupload' => 'required',
            // 'filenames.*' => 'mimes:doc,pdf,docx,zip'
        ]);
        $temp = $validator->errors()->all();
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $temp[0]], 409);
        }
        $data = [];

        if (is_array($request->file('filetoupload'))) {
            foreach($request->file('filetoupload') as $key => $file)
            {
                // $name = time().''.$key.'.'.$file->extension();
                // $file->move(public_path().'/files/', $name);
                $name = time().''.$key;
                $data[] = url('/').'/api/upload/'.$name;
                Upload::create([
                    'uniqid'    => time().''.$key,
                    'type'      => $file->extension(),
                    'base64'    => base64_encode(file_get_contents($file)),
                ]);
            }
        } else {
            $file = $request->file('filetoupload');
            // $name = time().'.'.$file->extension();
            // $file->move(public_path().'/files/', $name);
            $name = time().'';
            $data[] = url('/').'/api/upload/'.$name;
            Upload::create([
                'uniqid'    => time().'',
                'type'      => $file->extension(),
                'base64'    => base64_encode(file_get_contents($file)),
            ]);
        }


        // $file = $request->file('filename');
        // $name = time().'.'.$file->extension();
        // $file->move(public_path().'/files/', $name);

        // $file= new File();
        // $file->filenames=json_encode($data);
        // $file->save();


        return response()->json([ 'data'=> $data, 'message' => 'success get data'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show($uniqid = null)
    {
        $data = Upload::where('uniqid', '=', $uniqid)->first();
        $fileList = glob(public_path() .'/file/*');
        foreach($fileList as $filename){
            unlink($filename);
        };
        if ($data) {
            $dataImage = base64_decode($data->base64);
            $image_name= $data->uniqid.'_'.time().'.'.$data->type;
            $path = public_path() .'/file/'. $image_name;

            file_put_contents($path, $dataImage);

            $img = Image::make($path)->resize(400, null,function ($constraint) {
                $constraint->aspectRatio();
            });
            return $img->response($data->type);
            //serve the image
            // return  response()->file($path);
            // return response()->json([ 'data'=> $fileList, 'message' => 'success get data'], 200);
        } else {
            return abort('403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
