@extends('admin.layouts.app')
@section('title')
    SMTP Setting
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
              <p class="mb-0">SMTP Setting</p>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">SMTP Info</p>
            <form action="{{ route('admin.settings.smtp.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">From Name</label>
                    <input class="form-control" required type="text" value="{{ $smtp->smtp_from_name }}" name="smtp_from_name">
                    @error('smtp_from_name')
                      <span class="validated_txt">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">From Email</label>
                    <input class="form-control" required type="email" value="{{ $smtp->smtp_from_email }}" name="smtp_from_email">
                    @error('smtp_from_email')
                      <span class="validated_txt">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">SMTP Transport</label>
                    <input class="form-control" required type="text" value="{{ $smtp->smtp_transport }}" name="smtp_transport">
                    @error('smtp_transport')
                      <span class="validated_txt">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">SMTP Host</label>
                  <input class="form-control" required type="text" value="{{ $smtp->smtp_host }}" name="smtp_host">
                  @error('smtp_host')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">SMTP Port</label>
                  <input class="form-control" required type="number" value="{{ $smtp->smtp_port }}" name="smtp_port">
                  @error('smtp_port')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">SMTP Encyption</label>
                  <input class="form-control" required type="text" value="{{ $smtp->smtp_encryption }}" name="smtp_encryption">
                  @error('smtp_encryption')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">SMTP Username</label>
                  <input class="form-control" required type="text" value="{{ $smtp->smtp_username }}" name="smtp_username">
                  @error('smtp_username')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">SMTP Password</label>
                  <input class="form-control" required type="text" value="{{ $smtp->smtp_password }}" name="smtp_password">
                  @error('smtp_password')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">SMTP Status</label>
                  <select name="status" class="form-control">
                    <option value="1" {{ $smtp->status == 1 ? 'selected' : '' }}>Enable</option>
                    <option value="0" {{ $smtp->status == 0 ? 'selected' : '' }}>Disable</option>
                  </select>
                  @error('status')
                    <span class="validated_txt">{{ $message }}</span>
                  @enderror
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
