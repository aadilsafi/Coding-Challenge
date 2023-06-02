@if(isset($users))
@foreach ($users as $user )
<div class="p-2 shadow rounded mt-2  text-white bg-dark common-connections">{{$user->name}} - {{$user->email}}</div>
@endforeach
@endif
