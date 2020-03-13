$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#generalSearch').on('keyup', function () {
    roleModule.draw('page');
});

// $('#filterCountryStatus').on('change', function () {
//     countryList.draw('page');
// });


/**
 * datatable script for role table
 */



var roleModuleList = null
$(document).ready(function () {
    roleModuleList = $('#role-module').dataTable({
        "searching": false,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "responsive": true,
        "ajax": {
            "url": APP_URL + 'permission/listRoleModule',
            "type": "GET",
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
            "data": "role_id",
            "name": "role_id"
        },
        {
            "data": "module_ids",
            "name": "module_ids"
        },
        {
            "render": function (data, type, row) {
                return '<a class="mr-2" onClick="getRoleModelDetails(' + row.id + ')" data-toggle="modal" data-target="#schoolModel" data-backdrop="static"><i class="fa fa-pen" aria-hidden="true"></i></a><a class="mr-2" onClick="deleteRoleModule(' + row.id + ')"><i class="fa fa-trash" aria-hidden="true"></i></a>';
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

function getRoleModelDetails(id) {
    alert(id);
}