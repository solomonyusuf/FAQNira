@extends('shared.adminlayout')
@section('body')
    <?php
    $list = \App\Models\AccessRequest::get();
    ?>
    <div class="row">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light"> Access Requests </span>
         
        </h4>
        <div class="row">
            <div class="card">

                <div class="card-body card-datatable table-responsive">
                    <table id="table" class="dt-multilingual table border-top">
                        <thead>
                        <tr>

                             <th>ID</th>
                            <th>Staff</th>
                            <th>Article</th>
                            <th>Reason</th>
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
                                  {{$data->staff_name}}
                                </td>
                                <td>
                                    {{\App\Models\Article::find($data->article_id)?->title}}
                                  </td>
                                  <td>
                                    <div class="mt-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#basicModal{{$data->id}}">
                                            Reason
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal{{$data->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div  class="modal-dialog" role="document">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Reason</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! $data->reason !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </td>
                                   <td>


                                   @if(auth()->user()?->role == 'admin')


                                    <div class="mt-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#respond{{$data->id}}">
                                            Respond
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="respond{{$data->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <form action="{{route('update_access')}}" method="post" enctype="multipart/form-data" class="modal-dialog" role="document">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Access Request</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Staff Name</label>
                                                                <input name="title" value="{{$data->staff_name}}" disabled type="text" id="nameBasic" required class="form-control" />
                                                                <input name="id" value="{{$data->id}}" type="text" hidden required class="form-control" />
                                                            </div>
                                                            {{-- <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Duration</label>
                                                                <input name="duration" type="text" id="nameBasic" required class="form-control" />
                                                            </div> --}}
                                                            {{-- <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Expiry Date</label>
                                                                <input name="expiry" type="datetime-local" id="nameBasic" required class="form-control" />
                                                            </div> --}}
                                                            <div class=" mb-3">
                                                                <label for="nameBasic" class="form-label">Access Status <small> &nbsp;(determine if this category should be visible)</small></label>
                                                                <select name="access_granted" type="text" id="nameBasic" required class="form-control">
                                                                    @if($data->access_granted == 'granted')
                                                                    <option selected value="granted">Granted</option>
                                                                    <option value="rejected">Rejected</option>
                                                                        @elseif($data->access_granted == 'rejected')
                                                                        <option  value="granted">Granted</option>
                                                                    <option selected value="rejected">Rejected</option>

                                                                    @else <option value="granted">Granted</option>
                                                                    <option value="rejected">Rejected</option>

                                                                        @endif
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

                                     <a href="{{route('delete_access',$data->id)}}"   class="btn btn-danger mb-2">Delete</a>
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
