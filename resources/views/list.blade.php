@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Service</h3>
            </div>
            <div class="table-responsive container-xxl w-auto">
                <div style="display: flex; justify-content: flex-end; padding-top:10px">
                    <a href="{{ route('service.create') }}" class="btn btn-success">
                        New
                    </a>
                </div>
                <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">

                        </div>
                    </div>
                </div>
                <table class="table card-table table-vcenter text-nowrap datatable" id="example">
                    <thead>
                        <tr class="text-center">
                            <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 15l6 -6l6 6" />
                                </svg>
                            </th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>INFOMATION</th>
                            <th>DESCRIPTION</th>
                            <th>EXPIRATION DATE</th>
                            <th>Status</th>
                            <th>PRICE</th>
                            <th>PROMOTIONAL PRICE</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $key => $value)
                            <tr class="text-center">
                                <td class="text-center"><span class="text-secondary">{{ $value->id }}</span></td>
                                <td class="text-wrap">{{ $value->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/services/' . $value->feature_image) }}" alt="image">
                                </td>
                                <td class="text-wrap">
                                    {{ $value->infomation }}
                                </td>
                                <td class="text-wrap">
                                    {{ $value->des }}
                                </td>
                                <td class="text-center">
                                    {{ $value->exp_date }}</td>
                                </td>
                                <td>
                                    @if ($value->status == 1)
                                        <span class="badge bg-success me-1"></span> Đã hoàn thành
                                    @else
                                        <span class="badge bg-warning me-1"></span> Chưa hoàn thành
                                    @endif
                                </td>
                                <td class="text-center">{{ $value->price }}</td>
                                <td class="text-center">{{ $value->promotional_price }}</td>
                                <td class="text-center">
                                    <a href="{{ route('service.edit', [$value->id]) }}"
                                        class="btn btn-primary mb-2">Edit</a>
                                    <form onsubmit="return confirm('Do you want to delete from the database ?')"
                                        action="{{ route('service.destroy', [$value->id]) }}" method='post'>
                                        @method('POST')
                                        @csrf
                                        <input type="submit" name="" id="" class="btn btn-danger"
                                            value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M6 15l6 -6l6 6" />
                                </svg>
                            </th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Infomation</th>
                            <th>Description</th>
                            <th>Expiration Date</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Promotional Price</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
