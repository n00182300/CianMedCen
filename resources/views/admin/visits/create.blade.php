@extends ('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new a visit
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
              <form method="POST" action="{{ route('admin.visits.store')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                  {{-- <label for="patient_id">Patient</label>
                  <input type="text" class="form-control" id="patient_id" name="patient_id" value="{{ old('patient_id') }}" /> --}}

                  <label for="patient_id">Patient</label>
                  {{-- <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}" /> --}}
                  <select name="patient_id">
                    @foreach($patients as $patient)
                      <option value="{{ $patient->id}}" {{ (old('patient_id', $patient->id) == $patient->id) ? "selected" : ""}} >{{$patient->name}}</option>
                    @endforeach
                  </select>


                {{-- </div> --}}

                {{-- @foreach($doctors as $doctor)
                  <option value="{{ $doctor->id}}" {{ (old('doctor_id', $doctor->user->id) == $doctor->id) ? "selected" : ""}} >{{$doctor->name}}</option>
                @endforeach --}}

                <div class="form-group">
                  <label for="doctor_id">Doctor</label>
                  {{-- <input type="text" class="form-control" id="doctor_id" name="doctor_id" value="{{ old('doctor_id') }}" /> --}}
                  <select name="doctor_id">
                    @foreach($doctors as $doctor)
                      <option value="{{ $doctor->id}}" {{ (old('doctor_id', $doctor->id) == $doctor->id) ? "selected" : ""}} >{{$doctor->name}}</option>
                    @endforeach
                  </select>

                </div>
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" />
                </div>
                <div class="form-group">
                  <label for="startTime">Start Time</label>
                  <input type="time" class="form-control" id="startTime" name="startTime" value="{{ old('startTime') }}" />
                </div>
                <div class="form-group">
                  <label for="endTime">End Time</label>
                  <input type="time" class="form-control" id="endTime" name="endTime" value="{{ old('endTime') }}" />
                </div>
                <div class="form-group">
                  <label for="cost">Cost</label>
                  <input type="number" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" />
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
