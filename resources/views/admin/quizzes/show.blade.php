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
                                <h3 class="mb-0">{{ __('Name Quizzes: ')}} {{$quiz->name }}</h3>

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
                                            <a href="/admin/quizzes/{{$quiz->id}}/questions/create" class="btn btn-md btn-primary">{{ __('Add Quesion') }}</a>
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

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>                               
                                    <th scope="col">{{ __('Name Title') }} </th>
                                    <th scope="col">{{ __('Answers') }}</th>
                                    <th scope="col">{{ __('Right_Answer') }}</th>
                                    <th scope="col">{{ __('Score') }}</th>

                                    
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiz->questions as $questions)

                                    <tr>
                                       <td>{{ Str::limit($questions->title,30) }}</td>
                                        <td>{{ \Str::limit($questions->answers , 20) }}</td>

                                        <td>
                                            {{\Str::limit($questions->right_answer , 20) }}
                                        </td>
                                        <td>{{ $questions->score}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('questions.destroy', $questions) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('questions.edit', $questions) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Question?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                        @endforeach

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
             
                    </div>
                  
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection