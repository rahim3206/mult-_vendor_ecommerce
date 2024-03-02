@extends('admin.layouts.app')
@section('title')
    General Setting
@endsection
@section('admin_content')
<div class="card shadow-lg mx-4 mt-4">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ asset('settings/site/'.'/'.$settings->site_logo) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
              {{ $settings->site_name }}
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
                {{ $settings->site_email }}
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">General Setting</p>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Site Info</p>
            <form action="{{ route('admin.settings.general.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Site Name</label>
                  <input class="form-control" type="text" value="{{ $settings->site_name }}" name="site_name">
                  @error('site_name')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Site Email address</label>
                  <input class="form-control" type="email" value="{{ $settings->site_email }}" name="site_email">
                  @error('site_email')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Logo</label>
                  <input class="form-control" type="file" value="{{ $settings->site_name }}" name="site_logo">
                  @error('site_logo')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
                @isset($settings->site_logo)
                    <a class="btn btn-danger mr-auto" href="{{ route('admin.settings.general.logo') }}" >Remove</a>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('settings/site'.'/'.$settings->site_logo) }}" alt="" width="auto" height="100px"/>
                    </div>
                @endisset
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Favicon</label>
                  <input class="form-control" type="file"  name="site_favicon">
                  @error('site_favicon')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
                @isset($settings->site_favicon)
                    <a class="btn btn-danger mr-auto" href="{{ route('admin.settings.general.favicon') }}" >Remove</a>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('settings/site'.'/'.$settings->site_favicon) }}" alt="" width="auto" height="100px"/>
                    </div>
                @endisset
              </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Contact Information</p>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address</label>
                  <input class="form-control" type="text" value="{{ $settings->site_address }}" name="site_address">
                  @error('site_address')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Phone Number</label>
                  <input class="form-control" type="text" value="{{ $settings->site_phone }}" name="site_phone">
                  @error('site_phone')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Country</label>
                  <input class="form-control" type="text" value="{{ $settings->site_country }}" name="site_country">
                  @error('site_country')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">State</label>
                  <input class="form-control" type="text" value="{{ $settings->site_state }}" name="site_state">
                  @error('site_state')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">City</label>
                  <input class="form-control" type="text" value="{{ $settings->site_city }}" name="site_city">
                  @error('site_city')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Postal code</label>
                  <input class="form-control" type="text" value="{{ $settings->site_postal_code }}" name="site_postal">
                  @error('site_postal')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
              <button class="btn btn-primary btn-sm ms-auto float-end" type="submit">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
