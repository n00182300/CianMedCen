@extends ('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit a patient
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
              <form method="POST" action="{{ route('admin.patients.update', $patient->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $patient->name) }}" />
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $patient->address) }}" />
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" />
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $patient->email) }}" />
                </div>
                <div class="form-group">
                  <label for="insurance">Insurance</label>
                  <input type="text" class="form-control" id="insurance" name="insurance" value="{{ old('insurance', $patient->insurance) }}" />
                </div>
                <div class="form-group">
                  <label for="insuranceProvider">Insurance Provider</label>
                  <input type="text" class="form-control" id="insuranceProvider" name="insuranceProvider" value="{{ old('insuranceProvider', $patient->insuranceProvider) }}" />
                </div>
                <div class="form-group">
                  <label for="policyNumber">Policy Number</label>
                  <input type="text" class="form-control" id="policyNumber" name="policyNumber" value="{{ old('policyNumber', $patient->policyNumber) }}" />
                </div>
                <div class="float-right">
                  <a href="{{route('admin.patients.index')}}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
