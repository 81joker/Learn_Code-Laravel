@extends('layouts.app', ['title' => __('Courses Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Preview Courses') }}</h3>
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
                                             <a href="{{route('courses.create')}}" class="btn btn-primary" value="">Add Course</a>
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
                    
                    <div class="the-course" style="background-color:#ddd">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="course-image" >
                                        @if($course->photo)
                                        
                                    <img class="img-thumbnail img-center " src="/images/{{$course->photo->filename}}"  style="width: 100%">
                                     @else
                                     <img class="img-thumbnail  img-center" src="/images/default.jpeg"   style="width: 92%">

                                      @endif

                                        {{-- <div class="card-body">
                                         <h5 class="card-title">{{\Str::limit(  $course->title, 100)}}</h5>
                                         <form action="{{route('courses.destroy' , $course)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('courses.edit' , $course->id)}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="{{route('courses.show',$course->id)}}" class="btn btn-info btn-sm">Show</a>
                                            <input value="Delete" class="btn btn-danger btn-sm" type="submit" name="delete">

                                        </form>
                                        </div> --}}
                                      </div> 
                                </div>
                                <div class="col-sm-6   pt-5" >
                                    <h2 >{{Str::limit($course->title , 20)}}</h2>
                                    <h3 ><a href="/admin/tracks/{{$course->track->id}}">{{$course->track->name}}</a></h3>
                                    <div class="{{ $course->status == 0 ? 'text-success': 'text-danger' }}">{{$course->status == 0 ? 'FREE':'BAID'}}</div>
                                    {{-- <div >{{$course->track_id}}</div> --}}

                                </div>
                            </div>
                            <div class="table-responsive">
                                @include('layouts.Errors.errors')
                                <form action="#" autocomplete="off" method="POST">
                                   @csrf
                                   
                                   <div class="row">
                                       <div class="col ">
                                           <div class="card shadow">
                                               <div class="card-header border-0">
                                                   <div class="row align-items-center">
                                                       <div class="col-8 form-group">
                                                        <h2>Course Videos</h2>

                                                       </div>
                                                       <div class="col-4 text-right">
                                                        <a href='/admin/courses/{{$course->id}}/videos/create' class="btn btn-primary" value="">Add Videos</a>
                                                           {{-- <a href="#" class="btn btn-sm btn-primary">{{ __('Add Track') }}</a> --}}
                                                       </div>
                                                       <div class="col-8 form-group">
                                                        <h2></h2>

                                                       </div>
                                                       <div class="col-4 text-right">
                                                        <a href='/admin/courses/{{$course->id}}/quizzes/create' class="btn btn-primary" value="">Add Quez</a>
                                                           {{-- <a href="#" class="btn btn-sm btn-primary">{{ __('Add Track') }}</a> --}}
                                                       </div>
                                                       
                                                   </div>
                                               </div>
                                           </form>
                               
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('Title') }}</th>
                                            <th scope="col">{{ __('Creation Date') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($course->vadeos as $video)
                                            <tr>
                                               <td><a href="{{ route('videos.show' , $video )}}">{{Str::limit($video->title , 45) }}</a></td>
                                               
                                                <td>{{ $video->created_at->diffForHumans()}}</td>
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <form action="{{ route('videos.destroy', $video) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    
                                                                    <a class="dropdown-item" href="{{ route('videos.edit', $video) }}">{{ __('Edit') }}</a>
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Video?") }}') ? this.parentElement.submit() : ''">
                                                                        {{ __('Delete') }}
                                                                    </button>
                                                                </form>    
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                               
        
                            </div>
                            </div>
                        </div>   
                   

                    </div>
                     
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection