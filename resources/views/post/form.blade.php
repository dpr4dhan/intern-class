<!-- Modal -->
<div class="modal fade" id="postCreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" id="postCreateForm">
                <input type="hidden" name="post_id" id="post_id"value="0">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                        <span class="text-danger" id="titleError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="short_description" class="form-label">Short Description</label>
                        <textarea class="form-control desc" name="short_description" id="short_description" cols="30" rows="4"></textarea>
                        <span class="text-danger" id="short_descriptionError"></span>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control desc" name="description " id="description" cols="30" rows="7"></textarea>
                        <span class="text-danger" id="descriptionError"></span>
                    </div>
                    <div class="mb-3 ">
                        <label for="published_at" class="form-label">Published At</label>
                        <input type="text" name="published_at" id="published_at" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at">
                        <span class="text-danger" id="published_atError"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closePostCreateModal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


