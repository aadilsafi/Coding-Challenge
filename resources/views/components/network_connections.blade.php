<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card shadow  text-white bg-dark">
            <div class="card-header">Coding Challenge - Network connections</div>
            <div class="card-body">
                <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1" id="get_suggestions_btn"
                        onclick="getSuggestions()">Suggestions
                        ({{$suggestions->count()}})</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2" id="get_sent_requests_btn"
                        onclick="getRequests('sent')">Sent Requests
                        ({{$sent_requests->count()}})</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio3" id="get_received_requests_btn"
                        onclick="getRequests('received')">Received
                        Requests({{$received_requests->count()}})</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio4" id="get_connections_btn"
                        onclick="getConnections()">Connections
                        ({{$connections->count()}})</label>
                </div>
                <hr>

                <div id="content" class="">
                    {{-- Display data here --}}
                </div>
                <div id="skeleton" class="">
                    @for ($i = 0; $i
                    < 10; $i++) <x-skeleton />
                    @endfor
                </div>

                <div class="d-flex justify-content-center mt-2 py-3" id="load_more_btn_parent">
                    <button class="btn btn-primary" onclick="getMoreSuggestions()" id="load_more_btn">Load more</button>
                </div>
            </div>
        </div>
    </div>
</div>
