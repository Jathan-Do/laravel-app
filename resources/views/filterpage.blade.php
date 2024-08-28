<div class="page-wrapper">
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-4">
                <div class="col-md-3">
                    <form id="filter-form" action="{{ route('homepage.filter') }}" method="get" autocomplete="off"
                        novalidate class="sticky-top">
                        <div class="form-label">Job Types</div>
                        <div class="mb-4">
                            <label class="form-check">
                                <input type="checkbox" name="job_types[]" value="Sửa màn hình laptop"
                                    class="form-check-input">
                                <span class="form-check-label">Sửa màn hình laptop</span>
                            </label>
                            <label class="form-check">
                                <input type="checkbox" name="job_types[]" value="Thay màn hình laptop"
                                    class="form-check-input">
                                <span class="form-check-label">Thay màn hình laptop</span>
                            </label>
                            <label class="form-check">
                                <input type="checkbox" name="job_types[]" value="Thay pin laptop"
                                    class="form-check-input">
                                <span class="form-check-label">Thay pin laptop</span>
                            </label>
                            <label class="form-check">
                                <input type="checkbox" name="job_types[]" value="Thay bàn phím laptop"
                                    class="form-check-input">
                                <span class="form-check-label">Thay bàn phím laptop</span>
                            </label>
                            <label class="form-check">
                                <input type="checkbox" name="job_types[]" value="Vệ sinh & Bảo dưỡng laptop"
                                    class="form-check-input">
                                <span class="form-check-label">Vệ sinh & Bảo dưỡng laptop</span>
                            </label>
                        </div>
                        <div class="form-label">Salary Range</div>
                        <div class="mb-4">
                            <div id="salary-range"></div>
                            <input type="hidden" name="min_salary" id="min-salary" value="10000">
                            <input type="hidden" name="max_salary" id="max-salary" value="50000000">
                            <span id="salary-value"></span> - <span id="salary-max"></span>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary w-100">Confirm changes</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-9">
                    <div class="row row-cards">
                        <div class="space-y" id="product-list">
                            @if (isset($services) && $services->count())
                                @foreach ($services as $service)
                                    <div class="card product-item" data-job-type="{{ $service->name }}">
                                        <div class="row g-0">
                                            <div class="col-auto">
                                                <div class="card-body">
                                                    <div class="avatar avatar-md mt-2"
                                                        style="background-image: url('{{ asset('uploads/services/' . $service->feature_image) }}');">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card-body ps-0">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3 class="mb-0"><a
                                                                    href="#">{{ $service->name }}</a></h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <div
                                                                class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                                <div class="list-inline-item">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-inline" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                                        <path d="M13 7l0 .01" />
                                                                        <path d="M17 7l0 .01" />
                                                                        <path d="M17 11l0 .01" />
                                                                        <path d="M17 15l0 .01" />
                                                                    </svg>
                                                                    K-Tech
                                                                </div>
                                                                <div class="list-inline-item">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-inline" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                                                                        <path d="M9 7l4 0" />
                                                                        <path d="M9 11l4 0" />
                                                                    </svg>
                                                                    {{ number_format($service->price,0, '.', '.') }} VNĐ
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                                                <div class="list-item">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-inline" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                                        <path d="M13 7l0 .01" />
                                                                        <path d="M17 7l0 .01" />
                                                                        <path d="M17 11l0 .01" />
                                                                        <path d="M17 15l0 .01" />
                                                                    </svg>
                                                                    K-Tech
                                                                </div>
                                                                <div class="list-item">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-inline" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                                                                        <path d="M9 7l4 0" />
                                                                        <path d="M9 11l4 0" />
                                                                    </svg>
                                                                    {{ $service->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-auto">
                                                            <div class="mt-3 badges">
                                                                <div
                                                                    class="badge badge-outline text-secondary fw-normal badge-pill cursor-pointer">
                                                                    {{ $service->infomation }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="m-auto">No services found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

