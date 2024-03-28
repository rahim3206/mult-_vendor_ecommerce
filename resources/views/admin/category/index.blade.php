@extends('admin.layouts.app')
@section('title', 'All Categories')
@section('admin_content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <h6>Categories Table</h6>
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.create') }}"> <i class="fa fa-plus"></i> Add Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            #</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Sub Categories</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $serial = 1;
                                    @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="p-4"><p class="text-xs font-weight-bold mb-0">{{ $serial++ }}</p></td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $category->title }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($category->sub_categories as $sub_category)
                                                    <p class="text-xs font-weight-bold mb-0">{{ $sub_category->title }}</p>
                                                @endforeach
                                            </td>
                                            <td class="align-middle d-flex">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>&nbsp;
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="text-danger font-weight-bold text-xs btn"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        Delete
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="w-100 d-flex justify-content-end p-3">
                                <div>
                                    {{ $categories->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
