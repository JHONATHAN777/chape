<h1>create</h1> 

<form action="{{url('/user')}}" method="post" enctype="multipart/form-data">
@csrf
@include('user.form',['mode'=> 'Create'])


</form>

