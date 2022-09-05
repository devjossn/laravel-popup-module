@extends('popup::admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="message">
            @include('popup::message.alert')
        </div>
        <div class="row col-sm-12 page-titles">
            <div class="col-lg-5 p-b-9 align-self-center text-left  " id="list-page-actions-container">
                <div id="list-page-actions">
                    <!--ADD NEW ITEM-->
                    <a href="{{ route('admin.popup.create') }}" class="btn btn-danger btn-add-circle " id="popup-modal-button">
                        <span tooltip="Create new Popup." flow="right"><i class="fas fa-plus"></i></span>
                    </a>
                    <!--ADD NEW BUTTON (link)-->
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h3 class="card-title">Popup Edit</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive list-table-wrapper">
                        <table class="table table-hover dataTable no-footer" id="table" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image URL</th> 
                                <th>Button</th> 
                                <th>Side</th>  
                                <th>Animation</th>  
                                <th>V_Center</th>  
                                <th class="noExport">Action</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap 4 -->
<script src="{{ mix('admin/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
function datatables() {

    var table = $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [],
        select: true,
        
        aaSorting     : [[0, 'asc']],
        iDisplayLength: 25,
        stateSave     : true,
        responsive    : true,
        fixedHeader   : true,
        processing    : true,
        searchable    : false,
        serverSide    : true,
        "bDestroy"    : true, 
        pagingType    : "full_numbers",
        ajax          : {
            url     : '{{ url('popup/admin/ajax/data') }}',
            dataType: 'json'
        },
        columns       : [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'content', name: 'content'},
            {data: 'image', name: 'image'},
            {data: 'bt_name', name: 'bt_name'}, 
            {data: 'side', name: 'side'}, 
            {data: 'animation', name: 'animation'}, 
            {data: 'v_center', name: 'v_center'}, 
            {data: 'action', name: 'action', orderable: false, searchable: false,
                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                    //  console.log( nTd );
                    $("a", nTd).tooltip({container: 'body'});
                }
            }
        ],
    });
}
datatables();
</script>
<!-- CUSTOM JS -->

<script src="{{ mix('admin/js/custom.js') }}"></script>


@endsection
