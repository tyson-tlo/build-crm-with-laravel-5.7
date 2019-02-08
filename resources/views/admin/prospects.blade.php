@extends('admin.layouts.app')

@section('content')
@if (count($errors) > 0)

<div class="row">
    <div class="col-12">
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            <strong>There is an error on your form!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
    
@endif

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('name')}}    
                                    </div>                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('email')}}    
                                    </div>                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone_2">Secondary Phone:</label>
                                <input type="text" class="form-control" name="phone_2" value="{{ old('phone_2') }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                            </div>
                        </div>
                        {{-- /.col-md-6 -- First column --}}
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="province_state">Province/State:</label>
                                <input type="text" class="form-control" name="province_state" value="{{ old('province_state') }}">
                            </div>
                            <div class="form-group">
                                <label for="country">Country:</label>
                                <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                            </div>
                            <div class="form-group">
                                <label for="assigned">Assigned To:</label>
                                <select name="assigned" id="" class="form-control" value="{{ old('assigned') }}">
                                    <option value="0">Unassigned</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" {{ old('assigned') == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                    @endforeach
                                </select>                    
                            </div>
                            <div class="form-group">
                                <label for="note">Note:</label>
                                <textarea name="note" id="" cols="30" rows="9" class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}">{{ old('note') }}</textarea>
                                @if ($errors->has('note'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('note')}}    
                                    </div>                                    
                                @endif
                            </div>                            
                        </div>
                        {{-- /.col-md-6 --}}
                    </div>       
                         {{-- /.row  --}}
                    
                    <button class="btn btn-primary btn-sm btn-block">Add New Prospect</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('admin.layouts.scripts.scripts')
    <script src="{{ asset('js/admin/prospects.js') }}"></script>
@endpush