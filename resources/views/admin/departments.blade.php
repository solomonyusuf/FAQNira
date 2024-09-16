@extends('shared.adminlayout')
@section('body')
    <?php
    $list = \App\Models\Department::get();
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"> Departments </span>
            @if(auth()->user()?->role == 'admin')
            <div class="mt-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal">
                   Add Department
                </button>

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <form action="{{route('create_department')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Add Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class=" mb-3">
                                        <label for="nameBasic" class="form-label">Title</label>
                                        <input name="title" type="text" id="nameBasic" required class="form-control" />
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
                            <th>Action</th>
                         </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $data)
                            <tr>
                                <td>
                                    {{\Illuminate\Support\Str::limit($data->id,8,'')}}
                                </td>
                                   <td>
                                  {{$data->title}}
                                </td>

                                <td>

                                   @if(auth()->user()?->role == 'admin')
                                     <div class="mt-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#basicModal{{$data->id}}">
                                            Edit Department
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal{{$data->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <form action="{{route('update_department')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Department</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Title</label>
                                                                <input name="title" value="{{$data->title}}" type="text" id="nameBasic" required class="form-control" />
                                                                <input name="id" value="{{$data->id}}" type="text" hidden required class="form-control" />
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

                                     <a href="{{route('delete_department',$data->id)}}"   class="btn btn-danger mb-2">Delete</a>
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
