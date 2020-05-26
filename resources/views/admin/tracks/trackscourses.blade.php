@extends('layouts.app', ['title' => __('Track Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Course')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Track Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('tracks.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.Errors.errors')
                        <form method="post" action="/admin/tracks/{{$track->id}}/courses" autocomplete="off" enctype="multipart/form-data">
                              @csrf
                            <input type="hidden" name="admin" value="1">
                            <h6 class="heading-small text-muted mb-4">{{ __('Courses information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- START LINK --}}
                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('Link') }}</label>
                                    <input type="text" name="link" id="input-link" class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Link') }}" value="{{ old('link') }}" required>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- END LINK --}}

                               {{-- START STATUS --}}
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    <select name="status" id="input-status" class="form-control" >
                                        <option value = "0">Free</option>
                                        <option value= "1">Bay</option>
                                    </select>
    
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- END STATUS --}}
                                {{-- START TRACKS --}}
                                <div class="form-group{{ $errors->has('track_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-track_id">{{ __('Tracks') }}</label>
                                    <select name="track_id" id="" class="form-control" >

                                        <option value="{{$track->id}}" >{{$track->name}}</option>
                                </select>


                                    @if ($errors->has('track_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('track_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- END TRACKS --}}
                                {{-- START PHOTO --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Photo') }}</label>
                                    <input type="file" name="image" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Input Photo') }}" >
                                </div>
                                {{-- END PHOTO --}}

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
