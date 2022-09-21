@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">PM Module</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <button class="btn btn-sm btn-primary btn-lable-wrap left-label"  data-toggle="modal" data-target="#add-module" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add PM Module</span></button>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-module" data-whatever="@mdo">Add User</button> --}}
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tbl_module" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID PM Module</th>
                                        <th>Module Name</th>
                                        <th>Locater</th>
                                        <th>Active</th>
                                        <th>Insert By</th>
                                        <th>Update By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<!-- /Row -->

<div class="modal fade" id="add-module" tabindex="-1" role="dialog" aria-labelledby="add-moduleLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-moduleLabel1">Power Meter Module</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="txtModuleName" class="control-label mb-10">Module Name</label>
                        <input type="text" class="form-control" id="txtModuleName" name="txtModuleName">
                    </div>
                    <div class="form-group">
                        <label for="id_locater">Locater</label>
                        <select class="form-control" id="id_locater" name="id_locater">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label for="bitActive" class="control-label mb-10">Is Active?</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="form-check-input" id="bitActive" name="bitActive">
                        <label class="form-check-label" for="bitActive">Active</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection


@push('script')
<script type="text/javascript">
    var dtJson = $('#tbl_module').DataTable({
        ajax: "{{ route('module.get') }}",
        autoWidth: false,
        serverSide: true,
        processing: true,
        // aSorting: [
        //     [0, "desc"]
        // ],
        searching: true,
        displayLength: 10,
        lengthMenu: [10, 25, 50, 100],
        language: {
            paginate: {
                previous: '&nbsp;',
                next: '&nbsp;'
            }
        },
        columns: [
            {
                data: 'DT_RowIndex', name: 'DT_RowIndex'
            },
            {
                data: 'id_pmmodule'
            },
            {
                data: 'txtModuleName'
            },
            {
                data: 'locname'
            },
            {
                data: 'bitActive'
            },
            {
                data: 'txtInsertedBy'
            },
            {
                data: 'txtUpdatedBy'
            },
            {
                data: 'created_at'
            },
            {
                data: 'updated_at'
            },
            {
                data: 'action'
            }
        ],
    });

</script>
@endpush