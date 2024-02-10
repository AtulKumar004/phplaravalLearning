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
            <div class="col-md-8 col-xl-6 middle-wrapper" style = "border:2px solid red">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Basic Form</h6>

                        <form class="forms-sample" method = "post" action = '{{ route('admin.profile.store') }}'
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Name</label>
                                <input type="text" class="form-control" name= "name" value={{ $profileData->name }}
                                    id="exampleInputUsername1" autocomplete="off" placeholder="Full name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name = "email" value={{ $profileData->email }}
                                    id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPhoneNumber" class="form-label">Phone No</label>
                                <input type="number" class="form-control" name=  "phoneNo" id="exampleInputPhoneNumber"
                                    autocomplete="off" value={{ $profileData->phoneNo }} placeholder="Enter Phone no">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputAddress" class="form-label">Address</label>


                                <input type="text" class="form-control" name= "address"  id="exampleInputAddress"
                                    placeholder="Enter address" value={{ $profileData->address }}  />
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="image">File upload</label>
                                <input class="form-control" name= "photo" type="file" id="image" />
                            </div>

                            <div
                                style = "width: 4rem; height: 4rem; background: white; border-radius: 20rem; overflow: hidden;">
                                <img id = "showImage" style = "width: 100%; height: 100%; object-fit: contain"
                                    src= "{{ !empty($profileData->photo) ? url('upload/admin_image/' .$profileData->photo) : url('upload/no_image.jpg') }}" />

                            </div>


                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>

                    </div>
                </div>

            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3" style = "border:2px solid red">

            </div>
            <!-- right wrapper end -->
        </div>

    </div>
    {{-- <script type = "text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src' , e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);

        })
    })

    </script> --}}
    {{--
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            // Step 1: Wait for the document to be fully loaded

            var imageInput = document.getElementById('image');
            imageInput.addEventListener('change', function(e) {
                // Step 2: Attach an event listener to the file input with ID 'image' for the 'change' event

                var reader = new FileReader();

                // Step 3: Create a new FileReader object to read the contents of the selected file

                reader.onload = function(e) {
                    // Step 4: Set up a callback function to be executed when the file reading is complete

                    var showImage = document.getElementById('showImage');
                    showImage.setAttribute('src', e.target.result);
                    // Step 5: Update the 'src' attribute of the image with ID 'showImage' to display the selected image
                };

                reader.readAsDataURL(e.target.files[0]);
                // Step 6: Read the contents of the selected file as a data URL
            });
        });
    </script> --}}

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var image = document.getElementById('image');
            document.addEventListener('change', function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var showImage = document.getElementById('showImage');

                    console.log("showImage=====>", e.target.result)
                    showImage.setAttribute('src', e.target.result);

                }
                reader.readAsDataURL(e.target.files[0]);

            })
        })
    </script>
@endsection
