@extends('shared.layout')
@section('body')
        <?php

        $category = \App\Models\ArticleCategory::
            where(['title' => 'introduction'])
            ->first();
        $topic = \App\Models\Article::
            where(['article_category_id' => $category->id ])
            ->first();

        if(!$topic)
        {
            $category = \App\Models\ArticleCategory::where(['published'=> true])->orderBy('title', 'ASC')->first();

            $topic = \App\Models\Article::
            where('article_category_id', $category->id)
                ->orderBy('title', 'ASC')
                ->first();
        }

        if(request()?->article_id)
        {
           $topic = \App\Models\Article::find(request()?->article_id);
        }


        ?>

        <article>
            <header class="mb-9">
                <p class="font-display text-sm font-semibold text-sky-500 mb-1">{{ \App\Models\ArticleCategory::find($topic->article_category_id)?->title }}</p>
                <h1 class="font-display text-3xl tracking-tight text-slate-900 font-semibold">{{$topic->title}}</h1>
            </header>
            <div class="prose prose-slate max-w-none prose-headings:scroll-mt-28 prose-headings:font-display prose-headings:font-semibold lg:prose-headings:scroll-mt-[8.5rem] prose-lead:text-slate-500 prose-a:font-semibold prose-a:no-underline prose-pre:rounded-xl prose-pre:bg-slate-900 prose-pre:shadow-lg">
                {!! $topic->body !!}
            </div>
        </article>
        {{--<dl class="mt-12 flex">
            <div>
                <dt class="font-display text-sm font-semibold text-slate-900">Previous</dt>
                <dd class="mt-1"><a class="text-sm text-slate-600 hover:text-slate-900" href="index-2.html"><span aria-hidden="true">←</span> Getting started</a></dd>
            </div>
            <div class="ml-auto text-right">
                <dt class="font-display text-sm font-semibold text-slate-900">Next</dt>
                <dd class="mt-1"><a class="text-sm text-slate-600 hover:text-slate-900" href="docs/understanding-caching.html">Understanding caching<!-- --> <span aria-hidden="true">→</span></a></dd>
            </div>
        </dl>--}}
        <div class="mt-12 flex flex-col items-center space-y-6 border-t border-slate-200 pt-10">
            <h3 class="font-display font-semibold text-slate-900 text-lg">Was this article helpful?</h3>
            <div class="flex space-x-4">
                @if(\Illuminate\Support\Facades\Session::get('article_id') == $topic->id)
                    <button type="button" class="flex items-center space-x-2 min-w-[3.75rem] rounded-md bg-sky-50 px-2.5 py-1.5 text-sm font-semibold font-display text-sky-500 shadow-sm hover:bg-sky-100">
                        <span>Thank you for the feedback</span>
                    </button>
                @else
                    <form method="post" action="{{route('feedback')}}">
                        @csrf
                        <input value="helpful" name="response" hidden/>
                        <input value="{{$topic->id}}" name="article_id" hidden/>
                        <button type="submit" class="flex items-center space-x-2 min-w-[3.75rem] rounded-md bg-sky-50 px-2.5 py-1.5 text-sm font-semibold font-display text-sky-500 shadow-sm hover:bg-sky-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                            </svg>
                            <span>Yes</span>
                        </button>
                    </form>

                    <form method="post" action="{{route('feedback')}}">
                        @csrf
                        <input value="not_helpful" name="response" hidden/>
                        <input value="{{$topic->id}}" name="article_id" hidden/>
                        <button type="submit" class="flex items-center space-x-2 min-w-[3.75rem] rounded-md bg-sky-50 px-2.5 py-1.5 text-sm font-semibold font-display text-sky-500 shadow-sm hover:bg-sky-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>No</span>
                        </button>`
                    </form>
                    @endif

            </div>
            <p class="text-slate-700 text-sm">Have more questions? <a class="underline hover:text-sky-500" href="{{route('contact')}}">Submit a request.</a></p>
        </div>
    </div>
</div>
@endsection
