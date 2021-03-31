<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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

    public function getBlogaAdd(){

        return view('blog.add');

    }

    public function postBlogAdd(Request $request){

        try {
            $rules = [
                'title' => 'required',
                'img_publication' => 'mimes:jpeg,png,gif',
                
                
            ];
    
            $messages = [
                'title.required' => 'El campo de titulo es requerido',
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
   
                    $blog = new Blog();
                    $blog->title = e($request->input('title'));
                    $blog->blog_state = 1;
                    $blog->description = $request->input('description');
                    $blog->path = "blog/".$path."/";
                    $blog->image = $filename;
   
                    if ($request->input('video')) {
                       $blog->video = e($request->input('video'));
                       $src_videos = explode("/", $request->input('video'));
                       $blog->video_src = $src_videos[3];
                   }
                   if ($request->hasFile('document_blog')) {
                       
                    $pathd = date('Y-m-d');
                    $fileExtd = trim($request->file('document_blog')->getClientOriginalExtension()  );
                    $upload_pathd = Config::get('filesystems.disks.uploadDocuments.root');
                    $named = Str::slug( str_replace($fileExtd , '', $request->file('document_blog')->getClientOriginalName() ) );
    
                    $filenamed = rand(1,999).'-'.$named.'.'.$fileExtd;
                    
                    $file_filed = $upload_pathd.$pathd.'/'.$filenamed;
                    
                    $blog->document_blog = 'documents/'.$pathd.'/'.$filenamed;

                    $fl = $request->file('document_blog')->storeAs( $pathd , $filenamed, 'uploadDocuments' );
                }
        
                    if ( $blog->save()) {
                        
                        $fl1 = $request->file('img_publication')->storeAs( $path , $filename, 'uploadPbl' );
                        $img = Image::make($file_file);
    
                        $img->fit(720,360, function($constraint){
                            $constraint->upsize();
                        });
    
                        $img->save($upload_path.'/'.$path.'/t_'.$filename);
    
    
    
                        return redirect('/blog/edit/'.$blog->id)->withErrors($validator)->with('message', 'la publicacion se realizo correctamente')->with('typealert', 'success');
                    }else{
                        return back()->withErrors($validator)->with('message', 'Error al cargar la publicacion, Es necesario una imagen')->with('typealert', 'danger')->withInput();
                    }
    
                }else {
                   return back()->withErrors($validator)->with('message', 'Error al cargar la publicacion, Es necesario una imagen')->with('typealert', 'danger')->withInput();
                }
    
            endif;
        } catch (\Throwable $th) {
            return back()->withErrors($validator)->with('message', 'Verifica los datos, si el problema persiste contacta con el administrador del sistema')->with('typealert', 'danger')->withInput();

        }
 
     }

    public function getBlogEdit($id){

        return view('blog.edit', ['pbl' => Blog::find( $id)]);

    }

    public function postBlogEdit(Request $request, $id){
        try {
            
            $rules = [
                'title' => 'required',
                'img_publication' => 'mimes:jpeg,png,gif',
                
                
            ];

            $messages = [
                'title.required' => 'El campo de titulo es requerido',
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
                

                    $blog = Blog::findorFail($id);
                    $blog->title = e($request->input('title'));
                    $blog->blog_state = 1;
                    $blog->description = $request->input('description');
                    $blog->path = "blog/".$path."/";
                    $blog->image = $filename;
                    if ($request->input('video')) {
                        $blog->video = e($request->input('video'));
                        $src_videos = explode("/", $request->input('video'));
                        $blog->video_src = $src_videos[3];
                    }

                    if ($request->hasFile('document_blog')) {
                       
                        $pathd = date('Y-m-d');
                        $fileExtd = trim($request->file('document_blog')->getClientOriginalExtension()  );
                        $upload_pathd = Config::get('filesystems.disks.uploadDocuments.root');
                        $named = Str::slug( str_replace($fileExtd , '', $request->file('document_blog')->getClientOriginalName() ) );
        
                        $filenamed = rand(1,999).'-'.$named.'.'.$fileExtd;
                        
                        $file_filed = $upload_pathd.$pathd.'/'.$filenamed;
                        
                        $blog->document_blog = 'documents/'.$pathd.'/'.$filenamed;
    
                        $fl = $request->file('document_blog')->storeAs( $pathd , $filenamed, 'uploadDocuments' );
                    }
                

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
                    if ($request->input('video')) {
                        $blog->video = e($request->input('video'));
                        $src_videos = explode("/", $request->input('video'));
                        $blog->video_src = $src_videos[3];
                    }
                    if ($request->hasFile('document_blog')) {
                       
                        $pathd = date('Y-m-d');
                        $fileExtd = trim($request->file('document_blog')->getClientOriginalExtension()  );
                        $upload_pathd = Config::get('filesystems.disks.uploadDocuments.root');
                        $named = Str::slug( str_replace($fileExtd , '', $request->file('document_blog')->getClientOriginalName() ) );
        
                        $filenamed = rand(1,999).'-'.$named.'.'.$fileExtd;
                        
                        $file_filed = $upload_pathd.$pathd.'/'.$filenamed;
                        
                        $blog->document_blog = 'documents/'.$pathd.'/'.$filenamed;
    
                        $fl = $request->file('document_blog')->storeAs( $pathd , $filenamed, 'uploadDocuments' );
                    }


                    if ( $blog->save()) {
                        return back()->withErrors($validator)->with('message', 'la publicacion se actualizo correctamente')->with('typealert', 'success');

                    }else{
                        return back()->withErrors($validator)->with('message', 'Error al actualizar la publicacion.')->with('typealert', 'danger')->withInput();
                    }
                }

            endif;

        } catch (\Throwable $th) {
            return back()->withErrors($validator)->with('message', 'Verifica los datos, si el problema persiste contacta con el administrador del sistema.')->with('typealert', 'danger')->withInput();
        }
    }
    
}
