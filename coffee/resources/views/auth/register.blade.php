@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>

                            <div class="col-md-6 form-group ">
                                <select name="status" id="status"   class="form-control" required> 
                                    <option value="admin">Admin</option>
                                    <option value="farmer">Farmer</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="row mb-3">
                            <label for="exampleInputPassword1" class="col-md-4 col-form-label text-md-end ">รูป</label>
                            <div class=" col-md-6">
                              <input type="file"  id="inputGroupFile02" name="profile_image" class="form-control">
                              <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                          </div> --}}

                          <div class="row mb-3">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-end">Profile Image</label>
                            <div class="col-md-6">
                                <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" autocomplete="profile_image">
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          {{-- <div class="form-group row">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-end">รูปโปรไฟล์</label>
                            <div class="col-md-6">
                                <input type="file" name="profile_image" required>
                            </div>
                        </div> --}}
                        {{-- <input 
                        type="file"
                        class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                        name="profile_image"> --}}
                            {{-- <form action="upload" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="profile_image">
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                          </div>
                            </form> --}}

                        {{-- หน้าอัพโหลดรูป
                        <div class="row mb-3">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="col-md-6 col-form-label text-md-end">
                                @csrf
                                <!-- ... other form fields ... -->
                                <div  >
                                    <label for="profile_image" class="col-md-4 col-form-label text-md-end">Profile Image:</label>
                                    <div class="col-md-6 d-inline" >
                                         <input type="file" name="profile_image" id="profile_image" >
                                    </div>
                                </div>
                                
                            </form>
                        </div> --}}
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
