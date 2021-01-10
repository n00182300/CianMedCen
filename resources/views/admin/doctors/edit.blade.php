@extends ('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit a doctor
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
              <form method="POST" action="{{ route('admin.doctors.update', $doctor->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $doctor->name) }}" />
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $doctor->address) }}" />
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}" />
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $doctor->email) }}" />
                </div>
                <div class="form-group">
                  <label for="startDate">Start Date</label>
                  <input type="date" class="form-control" id="startDate" name="startDate" value="{{ old('startDate', $doctor->startDate) }}" />
                </div>
                <div class="float-right">
                  <a href="{{route('admin.doctors.index')}}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
