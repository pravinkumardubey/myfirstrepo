$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#roleSearch').on('keyup', function () {
    countryList.draw('page');
});

// $('#filterCountryStatus').on('change', function () {
//     countryList.draw('page');
// });


/**
 * datatable script for role table
 */



var roleList = null
$(document).ready(function () {
    roleList = $('#role-table').DataTable({
        "searching": false,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "responsive": true,
        "ajax": {
            "url": APP_URL + 'permission/listRole',
            "type": "POST",
            "data": function (d) {
                d.ll_name = $('#llFilterName').val();
                d.status = $('#llFilterStatus').val();
            }
        },
        "columns": [{
            "data": "id",
            "name": "id"
        },
        {
            "data": "role",
            "name": "role"
        },
        {
            "render": function (data, type, row) {
                return '<a class="mr-2" id="editSchoolBtn" onClick="getRoleDetailById(' + row.id + ')" data-toggle="modal" data-target="#schoolModel" data-backdrop="static"><i class="fa fa-pen" aria-hidden="true"></i></a>';
            }
        }
        ],
        "order": [
            [1, "desc"]
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            $("td:first", nRow).html(iDisplayIndex + 1);
            return nRow;
        },
    });
});

