@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Log History</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <button class="btn btn-sm btn-primary btn-lable-wrap left-label"  data-toggle="modal" data-target="#add-user" data-whatever="@mdo"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Add Log History</span></button>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user" data-whatever="@mdo">Add User</button> --}}
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="tbl_log_history" class="table table-hover display  pb-30" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Log History</th>
                                        <th>PM Module</th>
                                        <th>Output Voltage (Volt)</th>
                                        <th>Output Current (W)</th>
                                        <th>Output Power (Kwh)</th>
                                        <th>Output Power Total (Kwh)</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th width="10%">Active</th>
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

<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-userLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="add-userLabel1">Log History Energy</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-md-12">
                        <label for="id_pmmodule">PM Module</label>
                        <select class="form-control" id="id_pmmodule" name="id_pmmodule">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="intOutputVoltage" class="control-label mb-10">Output Voltage (Volt)</label>
                                <input type="number" class="form-control" id="intOutputVoltage" name="intOutputVoltage">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intOutputCurrent" class="control-label mb-10">Output Current (W)</label>
                                <input type="number" class="form-control" id="intOutputCurrent" name="intOutputCurrent">
                            </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="intOutputPower" class="control-label mb-10">Output Power (Kwh)</label>
                                <input type="number" class="form-control" id="intOutputPower" name="intOutputPower">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="intOutputPowerTotal" class="control-label mb-10">Output Power Total (KWh)</label>
                                <input type="number" class="form-control" id="intOutputPowerTotal" name="intOutputPowerTotal">
                            </div>
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
// $.fn.dataTable.moment('M/D/YYYY');

    var dtJson = $('#tbl_log_history').DataTable({
        ajax: "{{ route('log-history.get') }}",
        fields: [
            {
                label:  'Created At',
                name:   'created_at',
                type:   'datetime',
                // def:    function () { return new Date(); },
                format: 'M/D/YYYY',
            }, {
                label:  'Updated At',
                name:   'updated_at',
                type:   'datetime',
                // def:    function () { return new Date(); },
                format: 'M/D/YYYY',
                // fieldInfo: 'Verbose date format',
                // keyInput: false
            }
        ],
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
                data: 'id_log_history'
            },
            {
                data: 'moduleName'
            },
            {
                data: 'intOutputVoltage'
            },
            {
                data: 'intOutputCurrent'
            },
            {
                data: 'intOutputPower'
            },
            {
                data: 'intOutputPowerTotal'
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