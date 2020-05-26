@extends('layouts.app', ['title' => __('Question Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Question') }}</h3>
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
                                              <a href="{{route('questions.create')}}" class="btn btn-md btn-primary">{{ __('Add Question') }}</a>
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
                        @if(count($questions))

                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">{{ __('Quesions') }}</th>
                                    <th scope="col">{{ __('Answers') }}</th>
                                    <th scope="col">{{ __('Right_Answer') }}</th>
                                    <th scope="col">{{ __('Score') }}</th>
                                    <th scope="col">{{ __('Quiz Name') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td><a href="#" title="{{$question->title}}" target="_blank" rel="noopener noreferrer">{{Str::limit($question->title, 10)  }}</a></td>
                                        <td>{{ \Str::limit($question->answers , 10) }}</td>

                                        <td title="{{$question->right_answer}}">
                                            {{\Str::limit($question->right_answer,  10) }}
                                        </td>
                                        <td>{{ $question->score}}</td>
                                        <td><a href="/admin/quizzes/{{$question->quit->id}}/questions" title="{{$question->quit->name}}" >{{ $question->quit->name}}</a></td>

                                        <td>{{ $question->created_at->diffForHumans()}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('questions.destroy', $question) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('questions.edit', $question) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Question?") }}') ? this.parentElement.submit() : ''">
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

                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                      {{ $questions->links() }}
                  </nav>
              </div>
                    
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection