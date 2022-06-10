@extends('shop/layouts/authers/_master')
@section('title', 'Profile')
@section('content')
    <div class="profile">
        <div class="login">
            <div class="container">
                <div class="section-title">
                    <h2 class="title">
                        Profile
                    </h2>
                </div>

                <div class="card-body card-dashboard">
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <div class="text-center">
                                @if (Auth::user()->logo == '')
                                    <img class="rounded-circle" style="width: 150px; height:150px"
                                        src="{{ asset('assets/images/users/avatar.png') }}">
                                @else
                                    <img class="rounded-circle" style="width: 150px; height:150px"
                                        src="{{ $user->logo() }}">
                                @endif
                                </a>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="col-md-6">
                            <br>
                            <h4>First Name:</h4>
                            <h5>{{ $user->first_name }}</h5><br>
                            <h4>Laste Name:</h4>
                            <h5> {{ $user->last_name }}</h5><br>
                            <h4>Phone:</h4>
                            <h5>{{ $user->phone }}</h5><br>
                            <h4>Email:</h4>
                            <h5>{{ $user->email }}</h5><br>
                            <br>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <form class="form" action="{{ url('/user/profile_update/'. $user->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="form-group">
                                    <label>{{ __('admin/globale.logo') }}</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="logo">
                                        <span class="file-custom"></span>
                                    </label>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-body">
                                    <div class="row justify-content-center">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> {{ __('admin/globale.first_name') }}
                                                    </label>
                                                    <input type="text" value="{{ $user->first_name }}" id="first_name"
                                                        class="form-control" placeholder="  " name="first_name">
                                                    @error('first_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> {{ __('admin/globale.last_name') }}
                                                    </label>
                                                    <input type="text" value="{{ $user->last_name }}" id="last_name"
                                                        class="form-control" placeholder="  " name="last_name">
                                                    @error('last_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> {{ __('admin/globale.email') }} </label>
                                                    <input type="text" value="{{ $user->email }}" id="email"
                                                        class="form-control" placeholder="  " name="email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> {{ __('admin/globale.phone') }} </label>
                                                    <input type="text" value="{{ $user->phone }}" id="phone"
                                                        class="form-control" placeholder="  " name="phone">
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                        <i class="ft-x"></i>{{ __('admin/globale.back') }}
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i>{{ __('admin/globale.update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
