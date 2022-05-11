<h1>{{$mode}} User</h1>

<br>
<label for="profile_picture">Profile Picture</label>
@if(isset($user->profile_picture))
<img src="{{ asset('storage').'/'.$user->profile_picture }}" width="50" alt="">
@endif
<input type="file" name="profile_picture"  id="profile_picture">  


<br>
<label for="full_name">Full Name</label>
<input type="text" name="full_name" value="{{isset($user->full_name)?$user->full_name:''}}" id="full_name">
<br>
<label for="phone_number">Phone Number</label>
<input type="text" name="phone_number" value="{{isset($user->phone_number)?$user->phone_number:''}}" id="phone_number">
<br>
<label for="email">email</label>
<input type="text" name="email" value="{{isset($user->email)?$user->email:''}}" id="email">
<br>
<label for="password">Password</label>
<input type="text" name="password" value="{{isset($user->password)?$user->password:''}}" id="password">
<br>
<label for="status">Status</label>
<input type="text" name="status" value="{{isset($user->status)?$user->status:''}}" id="status">
<br>
<label for="role">Role</label>
<input type="text" name="role" value="{{isset($user->role)?$user->role:''}}" id="role">
<br>
<label for="document_type">Document Type</label>
<input type="text" name="document_type" value="{{isset($user->document_type)?$user->document_type:''}}" id="document_type">
<br>
<label for="document_number">Document Number</label>
<input type="text" name="document_number" value="{{isset($user->document_number)?$user->document_number:''}}" id="document_number">
<br>
<input type="submit" value="{{$mode}} data" >

<a href={{url('user/')}}> Return </a>
<br>