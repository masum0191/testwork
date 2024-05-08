@extends('layouts.admin', ['title' => 'My Profile'])

@section('mainContent')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-3">
                <div class="rounded-lg">
                    <img class="rounded" id="imgSrc" alt="profile_image" />
                </div>
                <div>
                    <h2 class="fw-bold font-bold">{{ auth()->user()->name }}</h2>
                    <span class="badge bg-warning fs-6 text-capitalize">{{ auth()->user()->user_type }}</span>
                </div>
            </div>
            <div>
                <p>Upload Profile</p>

                <div class="upload-container">
                    <form id="profile-picture-form" enctype="multipart/form-data">
                        @csrf
                        <label for="image" class="file-uploader">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-upload" viewBox="0 0 16 16">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                <path
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                            </svg>

                            <input type="file" class="d-none" id="image" name="profile_picture" />
                        </label>
                        <button type="submit">Upload Picture</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script>
        function loadImage() {
            let url = "{{ url('images/' . auth()->user()->profile_picture) }}";

            if (url.match(/\.(jpeg|jpg|gif|png)$/) != null) {
                return url;
            } else {
                return "/images/+url"
            }
        }

        $("#imgSrc").attr('src', loadImage())
    </script>
    <script>
        $(document).ready(function() {
            $('#profile-picture-form').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('upload.profile.picture') }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        alert('Profile picture uploaded successfully.');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while uploading the profile picture.');
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
    </script>
@endsection
