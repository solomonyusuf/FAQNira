<?php

namespace App\Http\Controllers;

use App\Jobs\KeyGenerateJob;
use App\Mail\ContactMail;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\DatabaseKey;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class PageController
{
    public static function AccountLogin(Request $request)
    {
        try
        {
            $user = auth()?->user();

            if($user) return redirect(route('dashboard'));

            $input = $request->all();


            $credential = array('email'=> $input['email'], 'password'=> $input['password']);

            if(auth()->attempt($credential, false))
            {
                $user = auth()->user();

                alert()->success("Welcome {$user?->first_name}", "Account login was successful");
                return redirect()->route('dashboard');

            }
            else
            {
                alert()->error("Invalid Credentials", "Sorry unable to login at the moment due to wrong credentials");
                return redirect()->back();
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
            toast('An Error Occured', 'error');
        }

        return redirect()->back();
    }

    public function login()
    {
        //KeyGenerateJob::dispatch();

        return view('login');
    }

    public function Search_all()
    {
        $search = request()?->search;

        $query = Article::where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
            ->get();


        return view('search', ['list_all'=> $query]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function AllUsers()
    {
        return view('admin.users');
    }
    public function ArticleCategories()
    {
        return view('admin.categories');
    }
    public function Articles($id)
    {
        return view('admin.articles', ['id'=> $id]);
    }
    public function EditArticle($id)
    {
        return view('admin.edit_article', ['data'=> Article::find($id)]);
    }
    public function Search()
    {
        $search = request()?->search;

        $query = Article::where('title', 'like', '%'.$search.'%')
                            ->orWhere('body', 'like', '%'.$search.'%')
                            ->get();

        return view('admin.search', ['data'=> $query ]);
    }
    public function Logout()
    {
        auth()->guard('web')->logout();
        toast('Logout Successful', 'success');
        return redirect()->route('home');
    }
    public function Dashboard()
    {
        $article = Article::count();
        $category = ArticleCategory::count();
        $users = User::count();
        $helpful = Article::sum('helpful');
        $unhelpful =  Article::sum('not_helpful');

        return view('admin.dashboard', ['unhelpful'=> $unhelpful, 'helpful'=> $helpful, 'article'=> $article, 'category'=> $category, 'user'=> $users]) ;
    }

    public function Account()
    {
        return view('admin.account', ['user'=> User::find(auth()?->user()?->id)]);
    }

    public function send_contact(Request $request)
    {
        Mail::to('tech_support@nira.org.ng')->send(new ContactMail(
            $request->company,
            $request->phone,
            $request->mail,
            $request->subject,
            $request->message,

        ));
        toast('Request has been sent', 'success');
        return redirect()->back();
    }

    public function feedback(Request $request)
    {

        $model = Article::find($request->article_id);

        if(!$model)
        {
            toast('Article Not Found', 'error');
            return redirect()->back();
        }
        session()->put('article_id', $model->id);

        if($request->response == 'helpful')
        {
            $model->helpful += 1;
        }
        else{
            $model->not_helpful += 1;
        }
        $model->save();

        toast('Thank you for feedback', 'success');
        return redirect()->back();
    }
}
