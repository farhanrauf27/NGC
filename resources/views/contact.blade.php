@extends('layouts.app')

@section('content')
    <style>
        
    </style>

    <div class="container">
        <div class="row mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card shadow">
                    <div class="card-header ">
                        Contact US
                    </div>
                    <div class="card-body ml-5 mr-5">

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
                            {{ csrf_field() }}

                            <div class="row mt-3 mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="email" placeholder="Email"
                                            value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Phone"
                                            value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" placeholder="Subject"
                                            value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 mb-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger show">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3 mt-5 mb-5">
                                <button type="submit" class="btn bttn btn-outline-dark shadow">
                                    Send &ensp;<i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
