<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Image;

class AdminBlogController extends Controller
{
    public function __Construct(){
        $this->middleware('auth');
        $this->middleware('adminUser');
    }

    public function getBlog($value){

        if ($value == 'all') {
            return view('blog.crud', ['blogs' => Blog::all()]);
        }
        return view('blog.crud', ['blogs' => Blog::where('blog_state', $value)->get()]);

    }

    public function getBlogEdit($id){

        return view('blog.edit', ['pbl' => Blog::find( $id)]);

    }

    public function postBlogEdit(Request $request, $id){

       $rules = [
            'title' => 'required',
            'description' => 'required',
            'img_publication' => 'mimes:jpeg,png,gif',
            
            
        ];

        $messages = [
            'title.required' => 'El campo de titulo es requerido',
            'description.required' => 'El campo de descripción es requerido',
            'img_publication.mimes' => 'Solo se aceptan imagenes JPEG, PNG, GIF',
            
        ];

        $validator = validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) :
            # code...
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        else :
           
            if ($request->hasFile('img_publication')) {

                $path = date('Y-m-d');
                $fileExt = trim($request->file('img_publication')->getClientOriginalExtension()  );
                $upload_path = Config::get('filesystems.disks.uploadPbl.root');
                $name = Str::slug( str_replace($fileExt , '', $request->file('img_publication')->getClientOriginalName() ) );

                $filename = rand(1,999).'-'.$name.'.'.$fileExt;

                $file_file = $upload_path.$path.'/'.$filename;
            //return $file_file;

                $blog = Blog::find($id);
                $blog->title = e($request->input('title'));
                $blog->description = e($request->input('description'));
                $blog->image = $filename;
                $blog->video = e($request->input('video'));
    
                if ( $blog->save()) {
                    
                    $fl1 = $request->file('img_publication')->storeAs( $path , $filename, 'uploadPbl' );
                    $img = Image::make($file_file);

                    $img->fit(720,360, function($constraint){
                        $constraint->upsize();
                    });

                    $img->save($upload_path.'/'.$path.'/t_'.$filename);



                    return back()->withErrors($validator)->with('message', 'la publicacion se actualizo correctamente')->with('typealert', 'success');
                }else{
                    return back()->withErrors($validator)->with('message', 'Error al cargar la publicacion, Es necesario una imagen')->with('typealert', 'danger')->withInput();
                }

            }else {
                $blog = Blog::find($id);
                $blog->title = e($request->input('title'));
                $blog->description = e($request->input('description'));
                $blog->video = e($request->input('video'));
    
                if ( $blog->save()) {
                    return back()->withErrors($validator)->with('message', 'la publicacion se actualizo correctamente')->with('typealert', 'success');

                }else{
                    return back()->withErrors($validator)->with('message', 'Error al actualizar la publicacion.')->with('typealert', 'danger')->withInput();
                }
            }

        endif;

    }
    
}
