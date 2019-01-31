@extends('admin.layouts.app')

@section('content')
<div class="row">
    <button class="btn btn-success btn-sm" id="add-prospect-btn">Add a Prospect</button>
</div>
    <div class="row">       



        @foreach ($prospects as $prospect)
            <div class="col-md-3 offset-md-2">
                <a href="{{ route('admin.prospect', ['id' => $prospect->id]) }}" style="text-decoration: none; color: black">                    
                    <div class="card mt-3">
                        <div class="card-header">
                            {{ $prospect->name }}
                        </div>
                        <div class="card-body">
                            <h6>Phone: {{ $prospect->phone }}</h6>
                            <h6>Email: {{ $prospect->email }}</h6>
                        </div>
                    </div>                    
                </a>
            </div>
        @endforeach
    </div>
    {{-- /.row --}}
    <div class="row mt-5">
        <div class="col-md-6 offset-md-4">
            <div class="" style="margin: 0 auto;">
                {{ $prospects->links() }}
            </div>
        </div>
    </div>

    {{-- Modals --}}
    <div class="modal-style" id="add-prospect-modal">
        <div class="card">
            <div class="card-header"><h5>Add New Prospect <span class="float-right close-modal">X</span> </h5></div>
            <div class="card-body">
                <form action="{{route('admin.prospect.store')}}" method="POST">
                    @csrf 
                    {{-- Adding created by will be done in the controller Auth::user() --}}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="phone_2">Secondary Phone:</label>
                        <input type="text" class="form-control" name="phone_2">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group">
                        <label for="province_state">Province/State:</label>
                        <input type="text" class="form-control" name="province_state">
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="assigned">Name:</label>
                        <select name="assigned" id="" class="form-control">
                            <option value="0" default>Unassigned</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>                    
                    </div>
                    <button class="btn btn-primary btn-sm">Add New Prospect</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('admin.layouts.scripts.scripts')
    <script src="{{ asset('js/admin/prospects.js') }}"></script>
@endpush