function ajaxForm(formItems) {
    var form = new FormData();
    formItems.forEach(formItem => {
        form.append(formItem[0], formItem[1]);
    });
    return form;
}



/**
 *
 * @param {*} url route
 * @param {*} method POST or GET
 * @param {*} functionsOnSuccess Array of functions that should be called after ajax
 * @param {*} form for POST request
 */
function ajax(url, method = "GET", functionBeforeSend, functionsOnSuccess, functionOnComplete, form = {}) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    if (typeof form === 'undefined' || form === null) {
        form = {};
    }

    $.ajax({
        url: url,
        type: method,
        data: form,
        async: true,
        beforeSend: functionBeforeSend,
        success: functionsOnSuccess,
        error: function () {
            alert("Something went wrong");
        },
        complete: functionOnComplete
    });
}


function exampleUseOfAjaxFunction(exampleVariable) {
    // show skeletons
    // hide content

    var form = ajaxForm([
        ['exampleVariable', exampleVariable],
    ]);

    var functionsOnSuccess = [
        [exampleOnSuccessFunction, [exampleVariable, 'response']]
    ];

    // POST
    ajax('/example_route', 'POST', functionsOnSuccess, form);

    // GET
    ajax('/example_route/' + exampleVariable, 'POST', functionsOnSuccess);
}

function exampleOnSuccessFunction(exampleVariable, response) {
    // hide skeletons
    // show content

    console.log(exampleVariable);
    console.table(response);
    $('#content').html(response['content']);
}

function getMore() {
    $(".content:hidden").slice(0, takeAmount).slideDown();
    if ($(".content:hidden").length == 0) {
        $("#load_more_btn").hide();
    }
}
