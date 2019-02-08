<form action="{{ route('admin.user.store') }}" method="POST" id="new-user-form">
    @csrf 
    <div class="form-group">
        <label for="name">New User Name:</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
        @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">New User Email</label>
        <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
        @if($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="role">Select New User Role:</label>
        <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" value="{{ old('role') }}">
            <option value="user" default>User</option>
            <option value="admin">Admin</option>
        </select>
        @if($errors->has('role'))
            <div class="invalid-feedback">
                {{ $errors->first('role') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Enter New User Temporary Password</label>
        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
        @if($errors->has('password'))
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirme New User Temporary Password</label>
        <input type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" name="confirm_password">
        @if($errors->has('confirm_password'))
            <div class="invalid-feedback">
                {{ $errors->first('confirm_password') }}
            </div>
        @endif
    </div>
    <button class="btn btn-block btn-primary">Add New User</button>
</form>