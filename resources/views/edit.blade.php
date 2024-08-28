@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="row row-cards">
            <div class="col-12">
                <form class="card" method="POST" action="{{ route('service.update',[$service->id])}}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="card-body">
                        <h3 class="card-title">Update Service</h3>
                        <div class="row row-cards">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$service->name}}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" value="{{$service->price}}">
                                    @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Promotional Price</label>
                                    <input type="text" class="form-control" name="promotional_price" value="{{$service->promotional_price}}">
                                    @error('promotional_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Expiration Date</label>
                                    <input type="date" id="" class="form-control"
                                        name="exp_date" value="{{$service->exp_date}}">
                                    @error('exp_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Infomation</label>
                                    <input type="text" class="form-control" name="infomation" value="{{$service->infomation}}">
                                    @error('infomation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Feature Image</label>
                                    <input type="file" name="feature_image">
                                    <img width="120" height="80" src="{{asset('uploads/services/'.$service->feature_image)}}" alt="image">
                                    @error('feature_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control form-select" name="status">
                                      <option value="" {{ $service->status === null && '' }}>Tất cả</option>
                                      <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Chưa hoàn thành</option>
                                      <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Đã hoàn thành</option>
                                  </select>                             
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 mb-0">
                                    <label class="form-label">Description</label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" name="des">{{$service->des}}</textarea>
                                    @error('des')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
