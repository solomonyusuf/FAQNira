<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Jobs\KeyGenerateJob;
use App\Mail\ContactMail;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\DatabaseKey;
use App\Models\AccessRequest;
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



            if(count($input['token']) == 6)
            {
                $token = implode('', $input['token']);

                $query_key = DatabaseKey::
                whereDate('approved_date', '=', Carbon::now()->toDate())->first();

                if(!$query_key)
                {
                    toast('No Database Key','error');
                    return redirect()->back();
                }
                if($query_key?->key != $token)
                {
                    toast('Token Invalid','error');
                    return redirect()->back();
                }


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
            else
            {
                toast('Token Unrecognized','error');
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
        KeyGenerateJob::dispatch();

        return view('login');
    }

    public function Search_all()
    {
        $search = request()?->search;

        $query = Article::where('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
            ->paginate(3);


            if(count($query) == 0)
                alert()->warning("No Results", 'Sorry no result has been found for the value you entered');
            else
            alert()->success("Result Found", 'Your results has been found and is being displayed.');

        return view('search', ['list'=> $query]);
    }

    public function contact()
    {
        return view('contact');
    }
    public function docs()
    {
        return view('docs');
    }

    public function AllUsers()
    {
        if(auth()->user()?->role !='admin')
        {
            toast('Unauthorized','error');
            return redirect()->back();
        }
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
    public function Department()
    {
        if(auth()->user()?->role !='admin')
        {
            toast('Unauthorized','error');
            return redirect()->back();
        }
        return view('admin.departments');
    }

    public function Requests()
    {
        if(auth()->user()?->role !='admin')
        {
            toast('Unauthorized','error');
            return redirect()->back();
        }
        return view('admin.requests');
    }
    public function EditArticle($id)
    {
        $user = auth()->user();
        $data = Article::find($id);
        $access = AccessRequest::where([
            'article_id'=> $data->id,
            'access_granted'=> 'granted',
            ])
            ->first();

       if($data->classified == 1)
       {
            if($access == null)
            {
                alert()->error('Unauthorized','Sorry the resource you are trying to access is classified');
                return redirect()->back();
            }
            if($user?->role != 'admin' && $access?->access_granted != 'granted')
            {
                alert()->error('Unauthorized','Sorry the resource you are trying to access is classified');
                return redirect()->back();
            }
       }

        return view('admin.edit_article', ['data'=> $data, 'access'=> $access]);
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
        $temp = ArticleCategory::get();
        $article = Article::count();
        $category = count($temp);
        $users = User::count();
        $helpful = Article::sum('helpful');
        $unhelpful =  Article::sum('not_helpful');

        $array_count = [];

        for($i = 0; $i < count($temp); $i++)
        {
            $array_count[$i] = count($temp[$i]?->articles);
        }

        $chart =  new DashboardChart;
        $chart->dataset('Articles', 'line', $array_count)
        ->color('#198754');;

        return view('admin.dashboard', ['unhelpful'=> $unhelpful, 'helpful'=> $helpful, 'article'=> $article, 'category'=> $category, 'user'=> $users, 'chart'=> $chart]) ;
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

        toast('Thank you for the feedback', 'success');
        return redirect()->back();
    }
}
