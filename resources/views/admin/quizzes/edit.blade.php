@extends('layouts.app', ['title' => __('Quiz Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Quiz')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quiz Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quizzes.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      @include('layouts.Errors.errors')
                        <form method="post" action="{{ route('quizzes.update', $quiz) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Quiz information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Quiz Name') }}</label>
                                     <input type="text" value="{{$quiz->name}}" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}"  required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                             
                                                                    </div>
                                    {{-- START Course --}}
                                    <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-track_id">{{ __('Course Title') }}</label>
                                        <select name="course_id" id="" class="form-control" >

                                        @foreach (\App\Cource::orderBy('id', 'desc')->get() as $course_id)
                                            <option <?php if ($quiz -> course->id == $course_id -> id) {
                                                echo "selected";
                                            } ?> value="{{$course_id->id}}" >{{Str::limit($course_id->title, 50)}}</option>
                                        @endforeach
                                    </select>


                                        @if ($errors->has('course_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('course_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{-- END Course --}}

                                     <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
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