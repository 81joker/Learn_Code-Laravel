@extends('layouts.app', ['title' => __('Tracks Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $track->name }}</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <a href="{{ route('tracks.create') }}" class="btn btn-sm btn-primary">{{ __('Add Track') }}</a>
                            </div> --}}
                        </div>
                    </div>
                    <div>
                       @include('layouts.Errors.errors')
                     <form action="{{ route('courses.create')}}" autocomplete="off" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col ">
                                <div class="card shadow">
                                    <div class="card-header border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8 form-group">
                                            </div>
                                            <div class="col-4 text-right">
                                            <a href="/admin/tracks/{{$track->id}}/courses/create" class="btn btn-primary" value="">Add Course</a>
                                                {{-- <a href="#" class="btn btn-sm btn-primary">{{ __('Add Track') }}</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                        @if(count($track->cource))
                        <div class="container">
                            <div class="row">
                                @foreach ($track->cource as $course)
    
                                <div class="col-xs-3">
                                    <div class="card" style="width: 18rem;">
                                        @if($course->photo)
                                        
                                    <img class="card-img-top img-thumbnail img-center " src="/images/{{$course->photo->filename}}" alt="Card image cap"  style="width: 92%">
                                     @else
                                     <img class="card-img-top img-thumbnail  img-center" src="/images/default.jpeg" alt="Card image cap"   style="width: 92%">

                                      @endif

                                        <div class="card-body">
                                         <h5 class="card-title">{{\Str::limit(  $course->title, 100)}}</h5>
                                         <form action="{{route('courses.destroy' , $course)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('courses.edit' , $course->id)}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('courses.show',$course->id)}}" class="btn btn-info btn-sm">Show</a>
                                            <input value="Delete" class="btn btn-danger btn-sm" type="submit" name="delete">

                                        </form>
                                        </div>
                                      </div>
                                  
                                </div>
                                @endforeach
    
                            </div>
                        </div>   
                        @else
                        <p class="lead text-center">
                            No Course Found
                        </p>
                        @endif

                    </div>
                    
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection