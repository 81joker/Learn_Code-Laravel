@extends('layouts.app', ['title' => __('Quizzes Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quizzes') }}</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <a href="{{ route('tracks.create') }}" class="btn btn-sm btn-primary">{{ __('Add Quiz') }}</a>
                            </div> --}}
                        </div>
                    </div>
                    <div>
                       @include('layouts.Errors.errors')
                     <form action="#" autocomplete="off" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col ">
                                <div class="card shadow">
                                    <div class="card-header border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8 form-group">
                                            </div>
                                            <div class="col-4 text-right">
                                                {{-- <input type="submit"  class="btn btn-primary" value="Add Quiz"> --}}
                                              <a href="{{route('quizzes.create')}}" class="btn btn-md btn-primary">{{ __('Add Quiz') }}</a>
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

                    <div class="table-responsive">
                        @if(count($quizzes))

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('NO.Questions') }}</th>
                                    <th scope="col">{{ __('Create Title') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quiz)
                                    <tr>
                                       <td><a href="{{route ('quizzes.show' , $quiz)}}" target="_blank" rel="noopener noreferrer">{{ $quiz->name }}</a></td>
                                        <td>{{ \Str::limit($quiz->questions , 30) }}</td>

                                        <td>
                                            <a href="/admin/courses/{{ $quiz->course->id }}">{{\Str::limit($quiz->course->title , 30) }}</a>
                                        </td>
                                        <td>{{ $quiz->created_at->diffForHumans()}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('quizzes.destroy', $quiz) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('quizzes.edit', $quiz) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Quiz?") }}') ? this.parentElement.submit() : ''">
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
                        @else
                        <p class="lead text-center">
                            No Track Found
                        </p>
                        @endif

                    </div>
                     <div class="card-footer py-4">
                         <nav class="d-flex justify-content-end" aria-label="...">
                           {{ $quizzes->links() }}
                       </nav>
                   </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection