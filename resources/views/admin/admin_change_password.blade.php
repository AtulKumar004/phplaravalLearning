@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center " style = "gap: 1.5rem; ">
                            <div
                                style = "width: 7rem; height: 7rem; background: white; border-radius: 20rem; overflow: hidden;">
                                <img style = "width: 100%; height: 100%; object-fit: contain"
                                    src= "{{ !empty($profileData->photo) ? url('upload/admin_image/' . $profileData->photo) : url('upload/no_image.jpg') }}" />
                            </div>
                            <p style = "font-size: 1.2rem; font-weight: 500">{{ $profileData->userName }}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="card-title mb-0">About</h6>
                            <div class="dropdown">
                                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="edit-2" class="icon-sm me-2"></i> <span
                                            class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="git-branch" class="icon-sm me-2"></i> <span
                                            class="">Update</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                            data-feather="eye" class="icon-sm me-2"></i> <span class="">View
                                            all</span></a>
                                </div>
                            </div>
                        </div>
                        <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of
                            Social.</p>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phono no:</label>
                            <p class="text-muted">{{ $profileData->phoneNo }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Password Reset</h6>

                        <form class="forms-sample" method = "post" action = '{{ route('admin.update.password') }}'
                            enctype="multipart/form-data">

                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="text"
                                    class="form-control
                                @error('old_password')
                                is-invalid

                                @enderror"
                                    name= "old_password" id="old_password" autocomplete="off"
                                    placeholder="Enter old password">
                                @error('old_password')
                                    <span class=  "text-denger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password"
                                    class="form-control
                                @error('new_password')
                                is-invalid

                                @enderror "
                                    name= "new_password" id="new_password" autocomplete="off"
                                    placeholder="Enter New Password">

                                @error('new_password')
                                    <span class=  "text-denger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_new_password"
                                    class="form-label
                                @error('confirme_new_password')
                                is-invalid

                                @enderror">Confirm
                                    New Password</label>
                                <input type="password" class="form-control" name= "new_password_confirmation"
                                    id="new_password_confirmation" autocomplete="off" placeholder="Enter Confirm Password">


                            </div>



                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>

                    </div>
                </div>

            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3">

            </div>
            <!-- right wrapper end -->
        </div>

    </div>
@endsection
