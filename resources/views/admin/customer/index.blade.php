@extends('admin.layouts.app')
@section('title', 'All Customers')
@section('admin_content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between w-100">
                            <div>
                                <h6>Customer Table</h6>
                            </div>
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.customers.create') }}"> <i class="fa fa-plus"></i> Add Customer</a>
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
                                            Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('default_avatar.jpg') }}" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $customer->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $customer->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $customer->phone }}</p>
                                            </td>
                                            <td class="align-middle d-flex">
                                                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>&nbsp;
                                                <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="post">
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
                                    {{ $customers->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
