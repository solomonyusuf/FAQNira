@extends('shared.adminlayout')
@section('body')
    <?php
    $user= \App\Models\User::find(auth()->user()->id);
    $list = \App\Models\Article::where(['article_category_id'=> $id])->get();

    if($user->role != 'admin')
    {
        $list = \App\Models\Article::where(['article_category_id'=> $id],
        ['departmen_id' => $user->department_id])->get();
    }
    $count = 101;
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"> Articles </span>
            @if(auth()->user()?->role == 'admin')
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

                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Classified <small> &nbsp;(determine if this article is a private one)</small></label>
                                        <select name="classified" type="text" id="nameBasic" required class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">True</option>
                                            <option value="0">False</option>
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Department <small> </small></label>
                                        <select name="department_id" type="text" id="nameBasic" required class="form-control">
                                            @foreach (\App\Models\Department::get() as $dept)
                                            <option value="{{$dept->id}}">{{$dept->title}}</option>
                                            @endforeach

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
            @endif
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
                            <th>Department</th>
                            <th>Status</th>
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
                                    {{\App\Models\Department::find($data?->department_id)?->title}}
                                </td>
                                <td>
                                    @if($data?->classified)
                                            classified
                                    @else
                                             Open
                                    @endif
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

                                    @if(auth()->user()?->role != 'admin')
                                    @if($data->classified)
                                    <?php
                                        $exist = \App\Models\AccessRequest::where(
                                            ['user_id' => auth()->user()->id],
                                            ['access_granted' => 'pending']
                                            )
                                            ->first();
                                    ?>
                                    @if($exist)
                                        <button class="btn btn-secondary"> Request Sent </button>
                                    @else
                                    <div class="mt-3 mb-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal{{$data->id}}">
                                            Request Access
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal{{$data->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <form action="{{route('request_access', $data->id)}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Request Access </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Staff Name</label>
                                                                <input name="staff_name" value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" type="text" id="nameBasic" required class="form-control" />
                                                                <input name="article_id" value="{{$data->id}}" type="text" hidden required class="form-control" />
                                                                <input name="user_id" value="{{auth()->user()->id}}" type="text" hidden required class="form-control" />

                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Reason</label>
                                                                <textarea name="reason" type="text" id="" required class="form-control">

                                                                </textarea>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    <a href="{{route('edit_article', $data->id)}}" class="btn btn-success mb-2" >
                                        Edit/View Article
                                    </a>
                                    @endif

                                    @if(auth()->user()?->role == 'admin')
                                    <a href="{{route('edit_article', $data->id)}}" class="btn btn-success mb-2" >
                                        Edit Article
                                    </a>



                                     <a href="{{route('delete_article',$data->id)}}"   class="btn btn-danger mb-2">Delete</a>
                                    @endif
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
