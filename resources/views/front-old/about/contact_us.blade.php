@extends('front-old.master')
@section('title')
    Contact Us
@endsection
@section('body')
    <div class="container-fluid py-5">
        <h5 class="text-center">Contact Us</h5>
        <hr class="w-25 mt-0 mx-auto">
        <div class="row mt-5">
            <div class="col-md-4 mb-3">
                <div class="mb-4">
                    <h5>Our Shop Address</h6>
                        <span><i class="fa-solid fa-location-dot"></i> Shop no. 53, level 6, estern mollika shopping complex, elephant road, dhaka</span>
                </div>
            </div>
            <div class="col-md-7 offset-md-1">
                @if(session("success"))
                    <div class="alert alert-secondary alert-dismissible fade show mb-2" role="alert">
                        {{ session("success") }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('contact_form_handler') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="email" class="mb-0">Enter email</label>
                            <input type="email" name="mail_from" id="email" class="form-control" min="5" max="100"
                                   placeholder="example@gmail.com" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="subject" class="mb-0">Subject</label>
                            <input type="text" name="mail_subject" id="subject" class="form-control" min="5" max="200"
                                   placeholder="bug report..." required>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="body" class="mb-0">Message</label>
                            <textarea name="mail_body" id="body" class="form-control" min="5" max="1000"
                                      placeholder="drop your message here..." rows="4" required></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-outline-danger rounded">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
