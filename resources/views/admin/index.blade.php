@extends('admin.layouts.app')

@section('content')

<div class="row">
    
    <div class="col-sm-12">
        {{-- Leaderboard and HUD --}}
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">Active Employees</div>
                    <div class="card-body">
                        <h4 class="text-center">4</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">Current Sales Leader</div>
                    <div class="card-body">
                        <h4 class="text-center">John Leader</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">Sales For Month</div>
                    <div class="card-body">
                        <h4 class="text-center">5</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">Total Sales Value</div>
                    <div class="card-body">
                        <h4 class="text-center">$42,089.23</h4>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
        {{-- End of leaderboard --}}
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">Unassigned Prospects</div>
                    <ul class="list-group list-group-flush">
                        @for($i = 0; $i < 6; $i++)
                            <li class="list-group-item">
                                Mr. Prospect <span class="float-right btn btn-sm btn-success">Assign</span>
                            </li>
                        @endfor
                        <li class="list-group-item">
                            <a href="#" class="btn btn-block btn-md btn-primary">View All Unassigned Leads</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">Recent Estimates</div>
                    <ul class="list-group list-group-flush">
                        @for($i = 0; $i < 6; $i++)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    Mr. Prospect
                                </div>
                                <div class="col-sm-4">
                                    June 5th, 2018
                                </div>
                                <div class="col-sm-4">
                                    Value: $54,789.90
                                    <span class="float-right btn btn-sm btn-success">Details</span>
                                </div>
                            </div>
                        </li>
                        @endfor
                        <li class="list-group-item">
                            <a href="#" class="btn btn-block btn-md btn-primary">View All Recent Estimates</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.col-sm-12 -->
</div><!-- /.row -->



@endsection