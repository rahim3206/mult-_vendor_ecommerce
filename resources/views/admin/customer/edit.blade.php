@extends('admin.layouts.app')
@section('title', 'Edit Customer')
@section('admin_content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Customer</p>
            </div>
          </div>
          <div class="card-body">

            <form action="{{ route('admin.customers.update',$customer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                  <input class="form-control" type="text" value="{{ $customer->name }}" name="name">
                  @error('name')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Phone Number</label>
                  <input class="form-control" type="text" value="{{ $customer->phone }}" name="phone">
                  @error('phone')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Country</label>
                  <input class="form-control" type="text" value="{{ $customer->country }}" name="country">
                  @error('country')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">City</label>
                  <input class="form-control" type="text" value="{{ $customer->city }}" name="city">
                  @error('city')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address</label>
                  <input class="form-control" type="text" value="{{ $customer->address }}" name="address">
                  @error('address')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Password</label>
                  <input class="form-control" type="password" placeholder="Password" name="password">
                  @error('password')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Confirm Password</label>
                  <input class="form-control" type="password" placeholder="Confirmed Password" name="password_confirmation">
                  @error('password_confirmation')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
              <button class="btn btn-primary btn-sm ms-auto float-end" type="submit">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
