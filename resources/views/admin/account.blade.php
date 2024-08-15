@extends('shared.adminlayout')
@section('body')
    <?php
    $data = \App\Models\User::first();
    ?>
    <div class="row card shadow">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Account </span>
        </h4>
        <form method="post" action="{{route('update_user')}}" enctype="multipart/form-data" class="row card-body">
            @csrf
            @if($data->image)
                <div class="col-5 mb-3">
                    <img src="{{asset($data->image)}}" style="height:120px;"  />
                </div>
            @endif
            <div class="col-5 mb-3">
                <label for="nameBasic" class="form-label">Image</label>
                <input name="image" type="file" id="nameBasic"  class="form-control" />
            </div>
            <div class="col-5 mb-3">
                <label for="nameBasic" class="form-label">First Name</label>
                <input value="{{$data->first_name}}" name="first_name" type="text" id="nameBasic" required class="form-control" />
                <input value="{{$data->id}}" name="id" type="text" hidden required class="form-control" />
            </div>
            <div class="col-5 mb-3">
                <label for="nameBasic" class="form-label">Last Name</label>
                <input value="{{$data->last_name}}" name="last_name" type="text" id="nameBasic" required class="form-control" />
            </div>
            <div class="col-5 mb-3">
                <label for="nameBasic" class="form-label">Email</label>
                <input  value="{{$data->email}}" name="email" type="email" id="nameBasic" required class="form-control" />
            </div>
            <div class="col-5 mb-3">
                <label for="nameBasic" class="form-label"> New Password</label>
                <input name="change_password" type="text" id="nameBasic"  class="form-control" />
            </div>
                <div class="col-5 mb-3">
                  <button type="submit" class="btn btn-success mt-5">
                      Save Changes
                  </button>
            </div>
        </form>
    </div>
    </div>
@endsection
