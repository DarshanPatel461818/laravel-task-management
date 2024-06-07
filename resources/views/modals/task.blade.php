<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-semibold fs-5" id="modalTitle">Add New Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="taskForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        <span class="text-danger fw-semibold" id="title_error"></span>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                        <span class="text-danger fw-semibold" id="description_error"></span>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label fw-semibold">Start Date</label>
                            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Start Date">
                            <span class="text-danger fw-semibold" id="start_date_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="end_date" class="form-label fw-semibold">End Date</label>
                            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="End Date">
                            <span class="text-danger fw-semibold" id="end_date_error"></span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="assignee" class="form-label fw-semibold">Assignee</label>
                        <select class="form-select" id="assignee" name="assignee">
                            @foreach($assignees as $assignee)
                                <option value="{{ $assignee }}">{{ $assignee }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="status" name="status">
                                @foreach($statuses as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="priorities" class="form-label fw-semibold">Priorities</label>
                            <select class="form-select" id="priorities" name="priority">
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority }}">{{ $priority }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Description</label>
                        <input type="file" name="image" class="form-control" id="image" />
                        <input type="hidden" name="existingImage" id="existingImage" />
                        <span class="text-danger fw-semibold" id="image_error"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary fw-semibold">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
