@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    Welcome {{Auth::user()->name}}
                </div>
                <div class="card-body">
                    <h5>{{Auth::user()->name}}</h5>
                    <h5>{{Auth::user()->email}}</h5>
                    <h5>{{Auth::user()->role}}</h5>
                </div>
            </div>
            {{-- /. card -- Displays user information --}}
            <div class="card mt-5">
                <div class="card-header">
                    Assigned Leads
                </div>
                <div class="card-body">
                    @foreach ($assigned_leads as $lead)
                        <h3>{{ $lead->name }}</h3>
                        <div class="row">
                            <div class="col-6">
                                <h5>{{ $lead->phone }}</h5>
                                <h5>{{ $lead->email }}</h5>
                            </div>
                            <div class="col-6">
                                <h5>{{ $lead->address }}</h5>
                                <h5>{{ $lead->city . ', ' . $lead->province_state}}</h5>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
