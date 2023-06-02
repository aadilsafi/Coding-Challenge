@foreach ($users as $user)

<div class="my-2 shadow text-white bg-dark p-1 content" id="{{$user->id}}" data-request-id="{{$user->id}}">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{$user->name}}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{$user->email}}</td>
      <td class="align-middle">
    </table>
    <div>
      @if ($mode == 'sent')
        <button id="cancel_request_btn_{{$user->id}}" class="btn btn-danger me-1"
          onclick="deleteRequest({{$user->id}})">Withdraw Request</button>
      @else
        <button id="accept_request_btn_{{$user->id}}" class="btn btn-primary me-1"
          onclick="acceptRequest({{$user->id}})">Accept</button>
      @endif
    </div>
  </div>
</div>

@endforeach

