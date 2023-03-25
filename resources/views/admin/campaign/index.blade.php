@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">{{ Session::get('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Campaign
                    <div class="form-group col-md-4">
                        <select name="store_id" id="store_id" class="form-control store_id">
                            <option value="">Select Store</option>
                            <?php foreach ($store as $key => $value) { ?>
                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                            <?php } ?>
                        </select>
                    </div>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.add_campaign') }}">Add</a>
                </div>
                <div class="card-body">
                    <table class="table  table-bordered datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Campaign Id</th>
                                <th>Store</th>
                                <th width="100px">Action</th>
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
<script type="text/javascript">
    $(document).ready(function() {


        $('#store_id').on('change', function() {
            table.ajax.reload();
        });

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.get_campaign') }}",
                data: function(d) {
                    d.store_id = $('#store_id').val(); // add store_id parameter
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'campaign_id',
                    name: 'campaign_id'
                },
                {
                    data: 'store_id',
                    name: 'store_id'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });
</script>
@endsection