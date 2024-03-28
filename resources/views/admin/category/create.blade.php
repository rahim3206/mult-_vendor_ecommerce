@extends('admin.layouts.app')
@section('title', 'Create Categories')
@section('admin_content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Create Category</p>
            </div>
          </div>
          <div class="card-body">

            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Title</label>
                    <input class="form-control" type="text" placeholder="Category Name" name="title">
                    @error('title')
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
