@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Campaign</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.save_campaign') }}" id="add_form" name="add_form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Store</label>
                                <select name="store_id" id="store_id" class="form-control">
                                    <option value="">Select Option</option>
                                    <?php foreach ($store as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">campaign id</label>
                                <input type="text" class="form-control" id="campaign_id" name="campaign_id" placeholder="campaign id">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">url</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="url">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="inactive">InActive</option>
                                    <option value="active">Active</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#add_form").validate({
            rules: {
                name: {
                    required: true,
                },
                image: {
                    required: true,

                }
            }
        });
    });
</script>
@endsection