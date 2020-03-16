$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/**
 * datatable script for tl table
 */
var feedbackList = null
$(document).ready(function () {
    feedbackList = $('#feedback-table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "autoWidth": false,
        "ajax": {
            "url": APP_URL + 'feedback/list',
            "type": "POST",
            "data": function (d) {
                d.searchName = $('#searchName').val();

            }
        },
        "columns": [{
            "data": null
        },
        {
            "data": "title",
            "name": "feedback.title"
        },
        {
            "data": "message",
            "name": "feedback.message"
        },
        {
            "data": "name",
            "name": "users.name"
        }
        ],
        'columnDefs': [{
            'targets': [0],
            'orderable': false
        }],
        "order": [
            [1, "desc"]
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:first", nRow).html(iDisplayIndex + 1);
            return nRow;
        },
    });
});
