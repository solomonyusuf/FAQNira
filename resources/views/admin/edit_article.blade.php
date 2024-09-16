@extends('shared.adminlayout')
@section('body')

{{-- @if($access)

    <script>
        var delay = {{$access->duration}} * 60000;
        var host = window.location.host;

       // Use setTimeout to navigate after the specified time
       setTimeout(function() {
           window.location.href = var url = "http://" + host + "/articles"; ;
       }, delay);
       </script>

       @endif --}}

    <form action="{{route('update_article')}}" method="post" enctype="multipart/form-data" class="card">
        @csrf
        <div class="card-body">
            <div class="card-header">
                <h5 class="card-title" id="exampleModalLabel1">Edit Article </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class=" mb-3">
                        <label for="nameBasic" class="form-label">Title</label>
                        <input name="title" value="{{$data->title}}" type="text" id="nameBasic" required class="form-control" />
                        <input name="id" value="{{$data->id}}" type="text" hidden required class="form-control" />
                        <input name="author" value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" type="text" hidden required class="form-control" />

                    </div>
                     <div class=" mb-3">
                        <label for="nameBasic" class="form-label">Article Category <small> &nbsp;(determine if this article should be visible)</small></label>
                        <select name="article_category_id" type="text" id="nameBasic" required class="form-control">
                            @foreach(\App\Models\ArticleCategory::get() as $item)
                            @if($data->article_category_id == $item->id)
                                <option selected value="{{$item->id}}">{{$item->title}}</option>

                            @else
                                <option value="{{$item->id}}">{{$item->title}}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="nameBasic" class="form-label">Body</label>
                        <textarea name="body" type="text" id="description"  required class="form-control">
                                {!! $data->body !!}
                                </textarea>
                    </div>
                    <div class=" mb-3">
                        <label for="nameBasic" class="form-label">Published <small> &nbsp;(determine if this article should be visible)</small></label>
                        <select name="published" type="text" id="nameBasic" required class="form-control">
                            @if($data->published)
                                <option selected value="1">True</option>
                                <option value="0">False</option>
                            @else
                                <option  value="1">True</option>
                                <option selected value="0">False</option>

                            @endif
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="nameBasic" class="form-label">Classified <small> &nbsp;(determine if this article is a private one)</small></label>
                        <select name="classified" type="text" id="nameBasic" required class="form-control">
                            @if($data->classified)
                            <option selected value="1">True</option>
                            <option value="0">False</option>
                        @else
                            <option  value="1">True</option>
                            <option selected value="0">False</option>

                        @endif
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="nameBasic" class="form-label">Department <small> </small></label>
                        <select name="department_id" type="text" id="nameBasic" required class="form-control">
                            @foreach (\App\Models\Department::get() as $dept)
                            @if($data->department_id == $dept->id)
                            <option selected value="{{$dept->id}}">{{$dept->title}}</option>
                            @else
                            <option value="{{$dept->id}}">{{$dept->title}}</option>

                            @endif
                            @endforeach

                        </select>
                    </div>

                </div>
            </div>
            @if(auth()->user()?->role == 'admin')

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            @endif
        </div>
    </form>

@endsection
