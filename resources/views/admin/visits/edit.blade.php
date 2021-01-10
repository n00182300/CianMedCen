@extends ('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit a visit
          </div>

          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              @endif
              <form method="POST" action="{{ route('admin.visits.update', $visit->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                  <label for="patient_id">Patient</label>
                  <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ old('patient_id', $visit->patient_id) }}" />
                </div>
                <div class="form-group">
                  <label for="doctor_id">Doctor</label>
                  <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id',$visit->doctor_id) }}" />
                </div>
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{ old('date',$visit->date) }}" />
                </div>
                <div class="form-group">
                  <label for="startTime">Start Time</label>
                  <input type="time" class="form-control" id="startTime" name="startTime" value="{{ old('startTime', $visit->startTime) }}" />
                </div>
                <div class="form-group">
                  <label for="endTime">End Time</label>
                  <input type="time" class="form-control" id="endTime" name="endTime" value="{{ old('endTime',$visit->endTime) }}" />
                </div>
                <div class="form-group">
                  <label for="cost">Cost</label>
                  <input type="number" class="form-control" id="cost" name="cost" value="{{ old('cost',$visit->cost) }}" />
                </div>

                <div class="float-right">
                  <a href="{{route('admin.visits.index')}}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
