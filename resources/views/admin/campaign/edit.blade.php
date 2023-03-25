@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Campaign</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.update_campaign') }}" id="edit_form" name="edit_form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $campaign['id'] }}" id="id" />

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Store</label>
                                <select name="store_id" id="store_id" class="form-control">
                                    <option value="">Select Option</option>
                                    <?php foreach ($store as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}" <?php if ($value['id'] == $campaign->store_id) echo 'selected'; ?>>{{ $value['name'] }}</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $campaign->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">campaign id</label>
                                <input type="text" class="form-control" id="campaign_id" name="campaign_id" placeholder="campaign id" value="{{ $campaign->campaign_id }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">url</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="url" value="{{ $campaign->url }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="inactive" <?php if ($campaign->status == 'inactive') echo 'selected'; ?>>InActive</option>
                                    <option value="active" <?php if ($campaign->status == 'active') echo 'selected'; ?>>Active</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#edit_form").validate({
            rules: {
                name: {
                    required: true,
                }
            }
        });
    });
</script>
@endsection