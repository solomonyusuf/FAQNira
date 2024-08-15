@extends('shared.adminlayout')
@section('body')
    <?php
    $list = $data
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"> Search Articles </span>

        </h4>

        <div class="row">
            <div class="card">

                <div class="card-body card-datatable table-responsive">
                    <table id="table" class="dt-multilingual table border-top">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Title</th>
                            <th>Article Category</th>
                            <th>Author</th>
                            <th>Published</th>
                            <th>Action</th>
                         </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $data)
                            <tr>
                                <td>{{\Illuminate\Support\Str::limit($data->id, 8,'')}}</td>
                                <td>
                                  {{$data->title}}
                                </td>

                                <td>
                                  {{\App\Models\ArticleCategory::find($data->article_category_id)?->title }}
                                </td>
                                <td>
                                    {{$data->author}}
                                </td>
                                <td>
                                   @if($data->published)
                                       true
                                    @else
                                       false
                                    @endif
                                </td>
                                <td>
                                   <a href="{{route('edit_article', $data->id)}}" class="btn btn-primary mb-2" >
                                            View/Edit Article
                                        </a>


                                     <a href="{{route('delete_article',$data->id)}}"   class="btn btn-danger mb-2">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
