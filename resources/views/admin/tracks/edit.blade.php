@extends('layouts.app', ['title' => __('Track Eidt')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Track') }}</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <a href="{{ route('tracks.create') }}" class="btn btn-sm btn-primary">{{ __('Add Track') }}</a>
                            </div> --}}
                        </div>
                    </div>
                    <div>
                       @include('layouts.Errors.errors')
                      <form action="{{ route('tracks.update' , $track)}}" autocomplete="off" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="row">
                            <div class="col ">
                                <div class="card shadow">
                                    <div class="card-header border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8 form-group">
                                            <input type="text" value="{{$track->name}}" placeholder="Track Name Input..." name="name" class="form-control">
                                            </div>
                                            <div class="col-4 text-right">
                                                <input type="submit"  class="btn btn-primary" value="Update Track">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                    
                   
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection