
@extends('shared.layout')

@section('body')

    <div class="container mx-auto py-8">
        <!-- Page Heading -->
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Search Articles</h2>
            <p class="text-gray-500">Find articles that match your interests or answer your questions.</p>
            <div class="search-bar my-4">
                <form  method="get" action="{{route('search_all')}}">
                    @csrf
                    <div class="input-group  mb-3">
                        <input type="text" value="{{request()?->search}}" class="form-control" placeholder="Search FAQs..." aria-label="Search FAQs" name="search">
                        <button class="btn btn-success" style="background: #198754;" type="submit">Search</button>
                    </div>
                     <div class="input-group mb-3">
                        <span> {{ $list->total()}} Result Found</span>
                    </div>
                </form>
            </div>
        </div>


        <!-- Search Results Section -->
        <div class="space-y-6 mt-2">
            @if(count($list) === 0)
                <div class="text-center text-gray-600">
                    <p>No results found for your query. Please try again with different keywords.</p>
                </div>
            @else
                @foreach($list as $data)
                    <!-- Result Card -->
                    <div class="flex flex-col md:flex-row items-start p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold text-blue-600 mb-2">
                                <a href="{{ url(route('home').'?article_id='.$data->id) }}" class="hover:underline">
                                    {{ $data->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500 mb-3">
                                Category: {{ \App\Models\ArticleCategory::find($data->article_category_id)?->title }}
                            </p>
                            <p class="text-gray-700 leading-relaxed mb-4">
                                {{ Str::limit(strip_tags($data->body), 150, '...') }}
                            </p>
                            <a href="{{ url(route('docs').'?article_id='.$data->id) }}" class="text-blue-500 font-medium hover:underline">
                                Read more
                            </a>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-6 flex-shrink-0">
                            <!-- Placeholder image icon for thumbnail -->
                            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18m-9 5h9" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    {{ $list->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
@endsection
