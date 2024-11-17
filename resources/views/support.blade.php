@extends('shared.support-layout')

@section('body')

<div class="col-lg-8">
    <div class="container mt-5">
        <div class="row">


            <!-- Form Section -->
            <div class="col-lg-6">
                <h2 class="text-dark text-bold mb-4"><strong>Create a Virtual Live Chat Meeting</strong></h2>
                <p class="text-muted">
                    Schedule a live chat meeting for with NiRA team. Choose a convenient time and set meeting details effortlessly.
                </p>
                <form action="{{ route('send_meeting') }}" method="POST" class="mt-4 border rounded p-4 shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="meeting_title" class="form-label fw-bold">Meeting Title</label>
                        <input type="text" class="form-control" id="meeting_title" name="title" required placeholder="Enter meeting title">
                    </div>

                    <div class="mb-3">
                        <label for="meeting_time" class="form-label fw-bold">Select Time</label>
                        <input type="datetime-local" class="form-control" name="schedule" required>

                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label fw-bold">Meeting Duration (in minutes)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required placeholder="e.g., 30">
                    </div>



                    <button type="submit" class="btn btn-outline-success w-100">Create Meeting</button>
                </form>
            </div>
            <!-- Image Section -->
            <div class="col-lg-6">
                <img src="img/bg3.jpg" alt="Virtual Meeting Illustration" class="img-fluid rounded shadow-sm" style="max-height: 350px; object-fit: cover;">
            </div>

        </div>

        <!-- Additional Information Section -->
        <div class="mt-5">
            <h3 class="text-center text-secondary">How Virtual Live Chat Meetings Work</h3>
            <p class="text-center text-muted">
                Our live chat feature powered by BigBlueButton ensures seamless interaction and collaboration with the team.
            </p>
            <div class="row text-center mt-4">
                <div class="col-lg-4">
                    <div class="card p-3 shadow-sm">
                        <i class="fa fa-calendar-check fs-2 text-success"></i>
                        <h5 class="mt-2">Schedule</h5>
                        <p class="text-muted">Set the date and time for your meeting.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-3 shadow-sm">
                        <i class="fa fa-video fs-2 text-success"></i>
                        <h5 class="mt-2">Join</h5>
                        <p class="text-muted">Share the link and join the meeting securely.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-3 shadow-sm">
                        <i class="fa fa-comments fs-2 text-success"></i>
                        <h5 class="mt-2">Collaborate</h5>
                        <p class="text-muted">Enjoy real-time interaction and collaboration.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-lg-4">

    @foreach ($meet as $data)
        <div class="card shadow mb-2">
         <div class="card-body">
            <h3 class="mb-2"> <strong>{{$data->title}}</strong></h3>
            <small  class="mb-2">{{$data->schedule}}</small>
            @if(\Carbon\Carbon::now() > \Carbon\Carbon::parse($data->schedule)->addMinutes($data->duration))
                Meeting Ended
            @else
            <a target="__blank" href="{{route('guest_join', $data->id)}}" class="btn btn-success mb-3"> join meeting</a>
            @endif
        </div>
        </div>
    @endforeach

</div>

@endsection
