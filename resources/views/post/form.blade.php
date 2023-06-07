<!-- Modal -->
<div class="modal" id="postCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('post.store')}}" id="postCreate">
                <div class="modal-body">
                    <div class="col-12">

                        <div class="card" style="width: 100%">
                            <div class="card-body">
                                <h5 class="card-title">Post Form</h5>

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" >
                                        <span class="text-danger" id="titleError"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="short_description" class="form-label">Short Description</label>
                                        <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="4"></textarea>
                                        <span class="text-danger" id="short_descriptionError"></span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="7"></textarea>
                                        <span class="text-danger" id="descriptionError"></span>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="published_at" class="form-label">Published At</label>
                                        <input type="text" name="published_at" id="published_at" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at" >
                                        <span class="text-danger" id="published_atError"></span>
                                    </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closePostCreateModal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



