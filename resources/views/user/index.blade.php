
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
<br>
<a href="{{ url('user/create') }}"> Register new users </a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            
            <th>Profile Picture</th>
            <th>Full Name</th>
            <th>Phone Number</th>
            <th>email</th>
            <th>Password</th>
            <th>Status</th>
            <th>Role</th>
            <th>Document Type</th>
            <th>Document Number</th>
            <th>Actions</th>
        </tr>
    </thead>
   
    @foreach ( $users as $user )
    <tbody>
        <tr>
            <td>{{ $user->id }}</td>

            <td>
                <img src="{{ asset('storage').'/'.$user->profile_picture }}" width="200" alt="">
            </td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->document_type }}</td>
            <td>{{ $user->document_number }}</td>

            <td>
                
                <a href="{{url('/user/'.$user->id.'/edit')}}">
                Edit
                </a>
                


            <form action="{{url('/user/'.$user->id)}}" method="post">
            @csrf

            {{ method_field('DELETE')}}
            <input type="submit" onclick="return confrim('are you sure you want to delete this record')" value="Delete" >

            </form>


            </td>
        </tr>
    </tbody>
    @endforeach
</table>