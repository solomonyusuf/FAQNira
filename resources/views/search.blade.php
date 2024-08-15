@extends('shared.layout')
@section('body')
    <?php
    $list = $list_all
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"> Search Articles </span>

        </h4>

        <div class="row">
            <div class="card">

                <div class="card-body card-datatable table-responsive">
                    @if(count($list) == 0)
                        <h4 class="mb-5">No results</h4>
                    @endif
                    <table id="table" class="dt-multilingual table border-top">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Article Category</th>
                             <th>Action </th>
                         </tr>
                        </thead>
                        <tbody>

                        @foreach($list as $data)
                            <tr>
                                <td>
                                  {{$data->title}}
                                </td>

                                <td>
                                  {{\App\Models\ArticleCategory::find($data->article_category_id)?->title }}
                                </td>
                                <td>
                                    <a href="{{ url(route('home').'?article_id='.$data->id) }}" class="btn btn-success"> View </a>
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
