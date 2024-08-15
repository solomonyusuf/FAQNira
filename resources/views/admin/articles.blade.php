@extends('shared.adminlayout')
@section('body')
    <?php
    $list = \App\Models\Article::where(['article_category_id'=> $id])->get();
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"> Articles </span>

            <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                   Add Article
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <form action="{{route('create_article')}}" method="post" enctype="multipart/form-data" class="modal-dialog modal-xl" role="document">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add Article</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Title</label>
                                        <input name="title" type="text" id="nameBasic" required class="form-control" />
                                        <input name="article_category_id" value="{{$id}}" type="text" hidden required class="form-control" />
                                        <input name="author" value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" type="text" hidden required class="form-control" />

                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Body</label>
                                        <textarea name="body" type="text" id="description" required class="form-control">

                                        </textarea>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Published <small> &nbsp;(determine if this article should be visible)</small></label>
                                        <select name="published" type="text" id="nameBasic" required class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                            Edit Article
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
