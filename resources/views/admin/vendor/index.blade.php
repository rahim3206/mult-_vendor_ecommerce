@extends('admin.layouts.app')
@section('title', 'All Vendor')
@section('admin_content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <h6>Vendors Table</h6>
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.vendors.create') }}"> <i class="fa fa-plus"></i> Add Vendor</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Store Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Products</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('default_avatar.jpg') }}" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $vendor->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $vendor->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <select name="status" class="changeVendorStatus {{ $vendor->status == '1' ? 'bg-gradient-success' : 'bg-gradient-danger' }}" data-id="{{ $vendor->id }}" data-url="{{ route('admin.vendors.change_status') }}">
                                                    <option value="1" {{ $vendor->status == '1' ? 'selected' : '' }}>Approaved</option>
                                                    <option value="0" {{ $vendor->status == '0' ? 'selected' : '' }}>Pending</option>
                                                </select>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">10</span>
                                            </td>
                                            <td class="align-middle d-flex">
                                                <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>&nbsp;
                                                <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="post">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
