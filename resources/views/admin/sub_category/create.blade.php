@extends('admin.layouts.app')
@section('title', 'Create Sub Categories')
@section('admin_content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Create Sub Category</p>
            </div>
          </div>
          <div class="card-body">

            <form action="{{ route('admin.sub_categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Select Parent Category</label>
                        <select class="form-control" name="category_id" required>
                            <option selected disabled>Select Parent Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="validated_txt">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Title</label>
                        <div class="d-flex">
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Category Name" name="title[]">
                            </div>
                            &nbsp;
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm" type="button" id="add_sub_category"> <i class="fa fa-plus"></i> Add</button>
                            </div>
                        </div>
                        @error('title')
                            <span class="validated_txt">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div id="sub_category_append">

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
