@extends('shared.adminlayout')
@section('body')
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
                        <input name="article_category_id" value="{{$data->article_category_id}}" type="text" hidden required class="form-control" />
                        <input name="author" value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" type="text" hidden required class="form-control" />

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

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </form>

@endsection
