<?php
 $category = \App\Models\ArticleCategory::where(['published'=> true])->orderBy('title', 'ASC')->get();

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="img/nira_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nira FAQ | Knowledge Base Document</title>
    <meta name="description" content="Knowledge Base TailwindCSS HTML Template">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@600;700&amp;display=swap" rel="stylesheet">
    <script defer src="../cdn.jsdelivr.net/npm/%40alpinejs/collapse%403.x.x/dist/cdn.min.js"></script>
    <script defer src="../cdn.jsdelivr.net/npm/alpinejs%403.x.x/dist/cdn.min.js"></script>
    <script src="../cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js" integrity="sha512-HcBl0GSJvt4Qecm4srHapirUx0HJDi2zYXm6KUKNNUGdTIN9cBwakVZHWmRVj4MKgy1AChqhWGYcMDbRKgO0zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body x-data="{ docs: false, mobile: false }" class="relative">
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Live Awesomplete Search
        var inputNavbar = document.getElementById("search");
        var list = [{
            label: "How do I enable payment gateway?",
            value: "doc.html"
        },
            {
                label: "What happens if I clear cache?",
                value: "doc.html"
            },
            {
                label: "Which payment methods do you offer?",
                value: "doc.html"
            },
            {
                label: "How long does it take to propagate DNS settings?",
                value: "doc.html"
            },
            {
                label: "How can I force SSL certificate?",
                value: "doc.html"
            }
        ];
        if (inputNavbar) {
            inputNavbar.addEventListener("awesomplete-selectcomplete", function(e) {
                window.location.href = e.text.value;
            }, false);
            new Awesomplete(inputNavbar, {
                autoFirst: true,
                list: list,
                replace: function(suggestion) {
                    this.input.value = suggestion.label;
                }
            });
        }
    });
</script>
@include('sweetalert::alert')
<header @click.outside="mobile = false"
        class="sticky top-0 z-50 bg-white shadow-md shadow-slate-900/5 transition duration-500">
    <div class="mx-auto max-w-7xl flex flex-wrap items-center space-x-8 justify-between px-6 lg:px-8 py-4">
        <div class="flex items-center">
            <a aria-label="Home page" href="{{route('home')}}">
                <img style="height:50px;" class="h-7 hidden sm:block" src="img/nira_logo.png" alt="Knowledge">
                <img class="h-7 sm:hidden" src="img/nira_logo.png" alt="Knowledge">
            </a>
            <nav class="hidden lg:flex lg:space-x-8 lg:ml-12 xl:ml-16">
                <a class='text-sm hover:text-sky-500 py-2.5 text-slate-900 font-display font-semibold' href='{{route('home')}}'>Docs</a>

                <a class='text-sm hover:text-sky-500 py-2.5 text-slate-900 font-display font-semibold' href='{{route('login')}}'>Sign in</a>

                <a class='text-sm hover:text-sky-500 py-2.5 text-slate-900 font-display font-semibold' href='{{route('contact')}}'>Contact</a>
            </nav>
        </div>
        <div class="flex items-center flex-1 justify-end">
            <form method="get" action="{{route('search_all')}}" class="w-full md:w-72 xl:w-96">
                @csrf
                <div class="w-full">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="search" name="search" data-minchars="1" value="{{request()?->search}}" data-maxitems="30"
                               class="block w-full rounded-md border-0 bg-white py-2.5 pl-10 pr-3 text-slate-900 ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-slate-300 sm:text-sm sm:leading-6"
                               placeholder="Search" type="search" autocomplete="off">
                    </div>
                </div>
            </form>
            <button @click="mobile = ! mobile" type="button" class="relative lg:hidden ml-4" aria-label="Open navigation">
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                     class="h-6 w-6 stroke-slate-500">
                    <path d="M4 7h16M4 12h16M4 17h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobile" :class="{ 'block': mobile, 'hidden': !(mobile) }" x-transition:enter="duration-200 ease-out"
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="z-10 origin-top transform transition hidden lg:hidden border-y border-slate-200" style="display: none;">
        <div class="overflow-hidden bg-white">
            <div class="space-y-1 p-4 sm:p-6">
                <div x-data="{ accordion: false }"><a href="#"
                                                      class="flex items-center rounded-lg px-4 py-3 text-base font-display font-semibold text-slate-900 hover:text-sky-500 hover:bg-slate-50"
                                                      @click.prevent="accordion = ! accordion"><span class="flex-1">Dropdown</span><svg
                            xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-90': accordion, 'transform-none': !(accordion) }"
                            class="h-6 w-6 transform-none" viewBox="0 0 20 20" fill="currentcolor">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414.0z"
                                  clip-rule="evenodd"></path>
                        </svg></a>
                    <div x-show="accordion" :class="{ 'block': accordion, 'hidden': !(accordion) }" class="hidden"
                         style="display: none;">
                        <a href="https://hugo-wireframe.netlify.app/heros/"
                           class="ml-4 flex items-center group rounded-lg px-4 py-3 text-slate-900 hover:text-sky-500 hover:bg-slate-50">
                            <div class="flex-shrink-0 mr-2.5 group-hover:text-sky-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="text-base font-display font-semibold">Application setting</span>
                        </a>
                        <a href="https://hugo-wireframe.netlify.app/features/"
                           class="ml-4 flex items-center group rounded-lg px-4 py-3 text-slate-900 hover:text-sky-500 hover:bg-slate-50">
                            <div class="flex-shrink-0 mr-2.5 group-hover:text-sky-500">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.75 6C3.75 4.75736 4.75736 3.75 6 3.75H8.25C9.49264 3.75 10.5 4.75736 10.5 6V8.25c0 1.24264-1.00736 2.25-2.25 2.25H6c-1.24264.0-2.25-1.00736-2.25-2.25V6z"
                                        stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M3.75 15.75c0-1.2426 1.00736-2.25 2.25-2.25H8.25c1.24264.0 2.25 1.0074 2.25 2.25V18c0 1.2426-1.00736 2.25-2.25 2.25H6c-1.24264.0-2.25-1.0074-2.25-2.25V15.75z"
                                        stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M13.5 6c0-1.24264 1.0074-2.25 2.25-2.25H18c1.2426.0 2.25 1.00736 2.25 2.25V8.25c0 1.24264-1.0074 2.25-2.25 2.25H15.75c-1.2426.0-2.25-1.00736-2.25-2.25V6z"
                                        stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M13.5 15.75c0-1.2426 1.0074-2.25 2.25-2.25H18c1.2426.0 2.25 1.0074 2.25 2.25V18c0 1.2426-1.0074 2.25-2.25 2.25H15.75c-1.2426.0-2.25-1.0074-2.25-2.25V15.75z"
                                        stroke="currentcolor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                            </div><span class="text-base font-display font-semibold">Product features</span>
                        </a>
                        <a href="https://hugo-wireframe.netlify.app/testimonials/"
                           class="ml-4 flex items-center group rounded-lg px-4 py-3 text-slate-900 hover:text-sky-500 hover:bg-slate-50">
                            <div class="flex-shrink-0 mr-2.5 group-hover:text-sky-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>
                            </div><span class="text-base font-display font-semibold">Free resources</span>
                        </a>
                        <a href="https://hugo-wireframe.netlify.app/galleries/"
                           class="ml-4 flex items-center group rounded-lg px-4 py-3 text-slate-900 hover:text-sky-500 hover:bg-slate-50">
                            <div class="flex-shrink-0 mr-2.5 group-hover:text-sky-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>
                            </div>
                            <span class="text-base font-display font-semibold">Video tutorials</span>
                        </a>
                    </div>
                </div>
                <a class='block rounded-lg px-4 py-3 text-base font-display font-semibold text-slate-900 hover:text-sky-500 hover:bg-slate-50' href='doc.html'>Document</a>
                <a class='block rounded-lg px-4 py-3 text-base font-display font-semibold text-slate-900 hover:text-sky-500 hover:bg-slate-50' href='contact.html'>Contact</a>
            </div>
        </div>
    </div>
</header>


<div class="relative mx-auto flex max-w-7xl justify-center px-2 lg:px-8">
    <div class="hidden lg:relative lg:block lg:flex-none">
        <div
            class="sticky top-[4.5rem] -ml-0.5 h-[calc(100vh-4.5rem)] w-64 overflow-y-auto overflow-x-hidden pt-16 pl-0.5 pr-8 xl:w-72 xl:pr-16">
            <nav class="text-sm">
                 <ul class="space-y-9">
                    @foreach($category as $data)
                        <?php
                            $topics = \App\Models\Article::
                                              where(['article_category_id' => $data->id], ['published'=> true])
                                            ->orderBy('title', 'ASC')
                                            ->get();
                            ?>
                        <li>
                            <h4 style="display:inline;" class="font-display font-semibold text-slate-900">
                                <div class="dropdown">
                                    <button class="btn btn-sm dropdown-toggle" type="button" id="{{$data->title}}" data-bs-toggle="dropdown" aria-expanded="false">
                                       <span style="font-size: 17px;">{{$data->title}} </span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="{{$data->title}}">
                                        @foreach($topics as $topic)
                                            <li><a
                                                    class="dropdown-item"
                                                    href="{{ url(route('home').'?article_id='.$topic->id) }}">{{$topic->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </h4>

                            {{--<ul class="mt-4 space-y-4 border-slate-200">
                                @foreach($topics as $topic)
                                <li class="relative"><a
                                        class="block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-sky-500 before:bg-sky-500"
                                        href="{{ url(route('home').'?article_id='.$topic->id) }}">{{$topic->title}}</a></li>
                                @endforeach
                           </ul>--}}
                        </li>
                    @endforeach

                </ul>
            </nav>
        </div>
    </div>
    <div class="min-w-0 max-w-2xl flex-auto px-4 pt-16 lg:max-w-none lg:pl-8 lg:pr-0 xl:px-16">
       @yield('body')
    </div>
</div>

<footer>
    <div class="mx-auto">

        <div class="mt-16 border-t border-slate-200 pt-8">

            <p class="mt-4 mb-5 text-xs leading-5 text-slate-500 md:order-1 md:mt-0 text-center">&copy; 2020 NiRA. All rights reserved
                reserved.</p>
        </div>
    </div>
</footer>

<div x-show="docs"
     class="fixed inset-0 overflow-y-auto overflow-x-hidden bg-slate-900/20 backdrop-blur z-50 transform transition lg:hidden"
     style="display: none;">
    <div @click.outside="docs = false" class="min-h-full w-full bg-white max-w-xs pt-7 pb-16 px-6 xl:pr-16">
        <div class="flex justify-end">
            <button @click="docs = ! docs" type="button"
                    class="inline-flex items-center justify-center text-slate-500 hover:text-sky-500 focus:outline-none"
                    aria-expanded="false">
                <span class="sr-only">Toggle main menu</span>
                <svg class="hh-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentcolor"
                     aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav>
            <ul class="space-y-9">
                <li>
                    <h2 class="font-display font-semibold text-slate-900">Introduction</h2>
                    <ul class="mt-3 space-y-3">
                        <li class="relative"><a
                                class="block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-sky-500 before:bg-sky-500"
                                href="index-2.html">Overview</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Getting started</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Installation</a></li>
                    </ul>
                </li>
                <li>
                    <h2 class="font-display font-semibold text-slate-900">Core concepts</h2>
                    <ul class="mt-3 space-y-3">
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Understanding caching</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Predicting user behavior</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Basics of time-travel</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Introduction to string theory</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>The butterfly effect</a></li>
                    </ul>
                </li>
                <li>
                    <h2 class="font-display font-semibold text-slate-900">Advanced guides</h2>
                    <ul class="mt-3 space-y-3">
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Writing plugins</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Neuralink integration</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Temporal paradoxes</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Testing</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Compile-time caching</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Predictive data generation</a></li>
                    </ul>
                </li>
                <li>
                    <h2 class="font-display font-semibold text-slate-900">API reference</h2>
                    <ul class="mt-3 space-y-3">
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>CacheAdvance.predict()</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>CacheAdvance.flush()</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>CacheAdvance.revert()</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>CacheAdvance.regret()</a></li>
                    </ul>
                </li>
                <li>
                    <h2 class="font-display font-semibold text-slate-900">Contributing</h2>
                    <ul class="mt-3 space-y-3">
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>How to contribute</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Architecture guide</a></li>
                        <li class="relative"><a class='block w-full pl-3.5 before:pointer-events-none before:absolute before:left-0.5 before:top-1/2 before:h-0.5 before:w-1.5 before:-translate-y-1/2 text-slate-500 before:hidden before:bg-slate-300 hover:text-slate-900 hover:before:block' href='doc.html'>Design principles</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

</body>

</html>
