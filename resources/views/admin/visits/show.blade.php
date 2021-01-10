@extends ('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

          <p id="alert-message" class="alert collapse"></p>

          <div class="card">
            <div class="card-header">
              Patient {{$visit->name}}
            </div>

            <div class="card-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td>Patient</td>
                    <td>{{$visit->patient_id}}</td>
                  </tr>
                  <tr>
                    <td>Doctor</td>
                    <td>{{$visit->doctor_id}}</td>
                  </tr>
                  <tr>
                    <td>Date</td>
                    <td>{{$visit->date}}</td>
                  </tr>
                  <tr>
                    <td>Start Time</td>
                    <td>{{$visit->startTime}}</td>
                  </tr>
                  <tr>
                    <td>End Time</td>
                    <td>{{$visit->endTime}}</td>
                  </tr>
                  <tr>
                    <td>Actions</td>
                    <td>{{$visit->actions}}</td>
                  </tr>
                </tbody>
              </table>
                         <a href="{{ route('admin.visits.index')}}" class="btn btn-default">Back</a>
                         <a href="{{ route('admin.visits.edit', $visit->id)}}" class="btn btn-warning">Edit</a>
                         <form style="display:inline block" method="POST" action="{{ route('admin.visits.destroy', $visit->id)}}">
                           <input type="hidden" name="_method" value="DELETE">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <button type="submit" class="form-control btn btn-danger">Delete</button>
                         </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endsection
