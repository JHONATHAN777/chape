

<form action="{{url('/user/'.$user->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('user.form',['mode'=> 'Edit'])

</form>



