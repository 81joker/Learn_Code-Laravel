@extends('layouts.app', ['title' => __('Quesions Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Quesions')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quesions Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            @include('layouts.Errors.errors')
                            <form method="post" action="{{ route('questions.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                {{-- <input type="hidden" name="admin" value="1"> --}}
                                <h6 class="heading-small text-muted mb-4">{{ __('Quesions information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-title">{{ __('Quesions') }}</label>
                                        <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Quesions') }}" value="{{ old('title') }}" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{-- START Answers --}}
                                    <div class="form-group{{ $errors->has('answers') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-answers">{{ __('Answers') }}</label>
                                        <input type="text" name="answers" id="input-answers" class="form-control form-control-alternative{{ $errors->has('answers') ? ' is-invalid' : '' }}" placeholder="{{ __('Answers') }}" value="{{ old('answers') }}" required>

                                        @if ($errors->has('answers'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('answers') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{-- END Answers --}}
                                    {{-- START Right_Answer --}}
                                    <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-right_answer">{{ __('Right_Answer') }}</label>
                                        <textarea type="text" name="right_answer" id="input-right_answer" class="form-control form-control-alternative{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" placeholder="{{ __('Right_Answer') }}" value="{{ old('right_answer') }}"  required>
                                       </textarea>

                                        @if ($errors->has('right_answer'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('right_answer') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    {{-- END Right_Answer --}}

                            {{-- START Score --}}
                            <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-score">{{ __('Question Score') }}</label>
                                <select name="score" id="" class="form-control form-control-alternative{{ $errors->has('score') ? ' is-invalid' : '' }}" placeholder="{{ __('Score') }}" value="{{ old('score') }}" required required>
                                    <option value="">Chois Score for the Course</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>


                                </select>
                                @if ($errors->has('score'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('score') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- END Score --}}
                            
                        
                            {{-- START TRACKS --}}
                            <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-quiz_id">{{ __('Quiz Name') }}</label>
                                <select name="quiz_id" id="quiz_id" class="form-control" >

                                @foreach (\App\Quiz::all() as $quiz)
                                    <option value="{{$quiz->id}}" >{{$quiz->name}}</option>
                                @endforeach
                            </select>


                                @if ($errors->has('quiz_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quiz_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- END TRACKS --}}
                           
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
