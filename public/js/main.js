var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;

function getRequests(mode) {
    ajax(`/requests/${mode}`, 'GET',commonBeforeSend,commonSuccess,commonComplete,)
}

function getConnections() {
    ajax(`/connections`, 'GET',commonBeforeSend,commonSuccess,commonComplete,)
}

function getSuggestions() {
    ajax('/suggestions', 'GET',commonBeforeSend,commonSuccess,commonComplete)
}


function getMoreConnectionsInCommon(userId) {
    $(".common-connections:hidden").slice(0, takeAmount).slideDown();
    if ($(".common-connections:hidden").length == 0) {
        $(`#load_more_connections_in_common_${userId}`).hide();
    }
}

function sendRequest(suggestionId) {
    let formData = {'user_id' : suggestionId}
    ajax('/requests', 'POST',null,commonRowDeleteSuccess(suggestionId),null,formData)
}

function deleteRequest(userId) {
    let formData = {'user_id':userId,'status':'-1'};
    ajax('/change/status', 'POST',commonRowDeleteSuccess(userId),null,null,formData)
}

function acceptRequest(userId) {
    let formData = {'user_id':userId,'status':'1'};
    ajax('/change/status', 'POST',commonRowDeleteSuccess(userId),null,null,formData)
}

function removeConnection(userId) {
    ajax(`/connections/${userId}`, 'Delete',commonRowDeleteSuccess(userId),null,null)
}

$(function () {
    getSuggestions();
});

function commonBeforeSend() {
    $('#skeleton').show()
    $('#load_more_btn').attr('onclick', 'getMore()')
}
function commonSuccess(data){
    $("#content").html(data);
            $("#content .content").hide();
            $("#content .content").slice(0, takeAmount).show();
            if($("#content .content").length > takeAmount){
                $('#load_more_btn').show()
            }
            else{
                $('#load_more_btn').hide()
            }
}
function commonComplete(){
    $('#skeleton').hide()
}
function commonRowDeleteSuccess(user_id){
    return function(){
        $(`#${user_id}`).remove();
    }
}
function getConnectionsInCommon(userId, connectionId) {
    // your code here...
    ajax(`/mutuals/${userId}`, 'GET',function(){
        $(`#connections_in_common_skeletons_${userId}`).show()
        $('#load_more_btn').attr('onclick', 'getMore()')

    },function (data) {
        $(`#content_common_${userId}`).html(data);
        $(`#content_common_${userId} .common-connections`).hide();
        $(`#content_common_${userId} .common-connections`).slice(0, takeAmount).show();

        if(  $(`#content_common_${userId} .common-connections`).length > takeAmount){
            $(`#load_more_connections_in_common_${userId}`).show()
        }
        else{
            $(`#load_more_connections_in_common_${userId}`).hide()
        }

    },function () {
        $(`#connections_in_common_skeletons_${userId}`).hide()
    })
}

