@foreach ($users as $user )

<div class="my-2 shadow text-white bg-dark p-1 content" id="{{$user->id}}">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{$user->name}}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{$user->email}}</td>
      <td class="align-middle">
    </table>
    <div>
      <button style="width: 220px" id="get_connections_in_common_" class="btn btn-primary" type="button"
        data-bs-toggle="collapse" data-bs-target="#collapse_{{$user->id}}" aria-expanded="false" aria-controls="collapseExample" onclick="getConnectionsInCommon('{{$user->id}}')">
        Connections in common ({{auth()->user()->mutualConnections($user)->count()}})
      </button>
      <button id="create_request_btn_" class="btn btn-danger me-1" onclick="removeConnection('{{$user->id}}')">Remove Connection</button>
    </div>

  </div>
  <div class="collapse" id="collapse_{{$user->id}}">

    <div id="content_common_{{$user->id}}" class="p-2">
      {{-- Display data here --}}
    </div>
    <div id="connections_in_common_skeletons_{{$user->id}}">
        @for ($i = 0; $i
        < 10; $i++) <x-skeleton />
        @endfor
    </div>
    <div class="d-flex justify-content-center w-100 py-2">
      <button class="btn btn-sm btn-primary" id="load_more_connections_in_common_{{$user->id}}" onclick="getMoreConnectionsInCommon('{{$user->id}}')">Load
        more</button>
    </div>
  </div>
</div>
@endforeach

