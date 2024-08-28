@extends('admin.app')
@section('content')
    <div class="col">
        <div class="row row-cards">
            <div class="col-12">
                <form class="card" method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Create Service</h3>
                        <div class="row row-cards">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Promotional Price</label>
                                    <input type="text" class="form-control" name="promotional_price"
                                        value="{{ old('promotional_price') }}">
                                    @error('promotional_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiration Date</label>
                                    <input type="date" id="" class="form-control" name="exp_date"
                                        value="{{ old('exp_date') }}">
                                    @error('exp_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Infomation</label>
                                    <input type="text" class="form-control" name="infomation"
                                        value="{{ old('infomation') }}">
                                    @error('infomation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Feature Image</label>
                                    <input type="file" name="feature_image">
                                    @error('feature_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control form-select" name="status">
                                        <option value="">Tất cả</option>
                                        <option value="0">Chưa hoàn thành</option>
                                        <option value="1">Đã hoàn thành</option>
                                    </select>
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 mb-0">
                                    <div class="form-group"> <label class="form-label">Description</label>
                                        <textarea id="ckeditor" rows="5" class="form-control" placeholder="Here can be your description" name="des">{{ old('des') }}</textarea>
                                        @error('des')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success">Create New</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

