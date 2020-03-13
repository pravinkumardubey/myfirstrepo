$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#moduleSearch').on('keyup', function () {
    countryList.draw('page');
});
/**
 * below line for code will select module list
 */
var countryList = null
$(document).ready(function () {
    let urlPath = 'permission/listModule';
    countryList = $('#country-table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "autoWidth": false,
        "ajax": {
            "url": APP_URL + urlPath,
            "type": "GET",
        },
        "columns": [{
            "data": "id",
            "name": "id"
        },
        {
            "data": "module_name",
            "name": "module_name"
        },
        {
            "render": function (data, type, row) {
                return '<a class="mr-2" id="editSchoolBtn" onClick="getModuleDetailById(' + row.id + ')" data-toggle="modal" data-target="#schoolModel" data-backdrop="static"><i class="fa fa-pen" aria-hidden="true"></i></a>';
            }
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
/**
 * below line for edit module
 * @param {int} id 
 */
function getModuleDetailById(id) {
    let urlPath = 'permission/getinfomodule';
    $.ajax({
        method: 'GET',
        url: APP_URL + urlPath,
        data: {
            id: id
        },
        success: function (data) {
            $('#id').val(data.id);
            $('#edit_module').val(data.module);
            $("#editModuleModal").modal("show");
        }
    });
}