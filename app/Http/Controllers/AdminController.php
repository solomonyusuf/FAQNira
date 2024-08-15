<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController
{

    public static function CreateUser(Request $request)
    {
        try
        {
            User::create(array(
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
                'image'=> UploadController::UploadFile($request, 'image'),
            ));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }

    public static function UpdateUser(Request $request)
    {
        try
        {
            $user = User::find($request->id);

            $user->update(array(
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'email'=> $request->email,
                'password'=> $request->change_password ? bcrypt($request->change_password) : $user->password,
                'image'=> $request->image ? UploadController::UploadFile($request, 'image') : $user->image,
            ));

            toast('Update Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function DeleteUser($id)
    {
        User::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public static function CreateCategory(Request $request)
    {
        try
        {
            ArticleCategory::create(array(
                'title' => $request->title,
                'published' => $request->published,
            ));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function UpdateCategory(Request $request)
    {
        try
        {
            $model = ArticleCategory::find($request->id);

            $model->update(array(
                'title' => $request->title,
                'published' => $request->published,
            ));
            $model->save();

            toast('Update Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function DeleteCategory($id)
    {
        ArticleCategory::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public static function CreateArticle(Request $request)
    {
        try
        {
            Article::create(array(
                'author' => $request->author,
                'title'=> $request->title,
                'article_category_id'=> $request->article_category_id,
                'body'=> $request->body,
                'published'=> $request->published,
            ));

            toast('Creation Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function UpdateArticle(Request $request)
    {
        try
        {
            $model = Article::find($request->id);

            $model->update(array(
                'author' => $request->author,
                'title'=> $request->title,
                'article_category_id'=> $request->article_category_id,
                'body'=> $request->body,
                'published'=> $request->published,
            ));
            $model->save();

            toast('Update Successful', 'success');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();

    }
    public static function DeleteArticle($id)
    {
        Article::find($id)->delete();
        toast('Deletion Successful','success');
        return redirect()->back();

    }
    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_blog_image_'.time().'.'.$extension;
            $logo = asset('Staticfiles/'.time().$filenametostore);
            //Upload the file
            $request->file('upload')->move(public_path('Staticfiles'), $logo);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = $logo;

            $msg = 'Image added successfully';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
}
}
