$(document).ready(function (){
    const addTaskBtn = $('#addTask');
    const taskModal = $('#taskModal');
    const taskForm = $('#taskForm');
    let dataTable;

    addTaskBtn.on('click', function() {
        taskForm.trigger('reset')
        taskForm.attr('action', 'tasks/store')
        $('#modalTitle').text('Add New Task')
        taskModal.modal('show');
    });

    function initializeDataTable() {
        dataTable = $('#taskTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "tasks",
                type: 'GET'
            },
            columns: [
                { data: null,
                    render: function(data) {
                        return `<input type="checkbox" class="task-checkbox" data-id="${data.id}">`;
                    }
                },
                { data: 'id' },
                { data: null,
                    render: function (data){
                        const imageUrl = data ? `/storage/${data.image}` : '/path/to/default-image.jpg';
                        return `<img src="${imageUrl}" alt="Task Image" style="width: 50px; height: 50px;"/>`;
                    }
                },
                { data: 'title' },
                { data: null,
                    render: function (data){
                        return `<span class="badge bg-primary fs-6">${data.status}</span>`;
                    }
                },
                { data: null,
                    render: function (data){
                        return `<span class="badge bg-danger fs-6">${data.priority}</span>`;
                    }
                },
                { data: 'start_date' },
                { data: 'end_date' },
                { data: 'assignee' },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<button class="btn btn-sm btn-primary edit" data-id="${data}">Edit</button>
                                <button class="btn btn-sm btn-danger delete" data-id="${data}">Delete</button>`;
                    },
                    orderable: false,
                    searchable: false
                }
            ]
        });

        function updateMassDeleteBtnVisibility() {
            if ($('.task-checkbox:checked').length > 0) {
                $('#massDeleteBtn').removeClass('d-none');
            } else {
                $('#massDeleteBtn').addClass('d-none');
            }
        }

        $('#taskTable').on('change', '.task-checkbox', function() {
            updateMassDeleteBtnVisibility();
        });

        updateMassDeleteBtnVisibility();

        $('#massDeleteBtn').on('click', function() {
            const selectedIds = [];
            $('.task-checkbox:checked').each(function () {
                selectedIds.push($(this).data('id'));
            });
            if (selectedIds.length === 0) {
                Swal.fire('Error!', 'Please select tasks to delete.', 'error');
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete selected tasks?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete them!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/tasks/massDelete',
                        type: 'POST',
                        data: {ids: selectedIds, _token: $('meta[name="csrf-token"]').attr('content')},
                        success: function (response) {
                            Swal.fire('Deleted!', 'Selected tasks have been deleted.', 'success');
                            dataTable.ajax.reload();
                            $('#massDeleteBtn').addClass('d-none');
                        },
                    });
                }
            });
        });

        $('#taskTable tbody').on('click', 'button.edit', function() {
            const taskId = $(this).data('id');
            $.ajax({
                url: `/tasks/${taskId}/edit`,
                type: 'GET',
                success: function(response) {
                    taskModal.modal('show')
                    taskForm.trigger('reset')
                    taskForm.validate().resetForm();
                    $('#modalTitle').text('Update Task')
                    $('#title').val(response.title)
                    $('#description').val(response.description)
                    $('#start_date').val(response.start_date)
                    $('#end_date').val(response.end_date)
                    $('#assignee').val(response.assignee)
                    $('#status').val(response.status)
                    $('#priorities').val(response.priority)
                    $('#existingImage').val(response.image)
                    $('#taskForm').attr('action', `tasks/${response.id}/update`)
                },
            });
        });

        $('#taskTable tbody').on('click', 'button.delete', function() {
            const taskId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this task?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/tasks/${taskId}`,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'The task has been deleted.',
                                'success'
                            );
                            dataTable.ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the task.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    }

    taskForm.validate({
        rules: {
            title: { required: true },
            description: { required: true },
            start_date: { required: true, date: true },
            end_date: { required: true, date: true },
            assignee: { required: true }
        },
        messages: {
            title: { required: "Please enter a title" },
            description: { required: "Please enter a description" },
            start_date: { required: "Please enter a start date", date: "Please enter a valid date" },
            end_date: { required: "Please enter an end date", date: "Please enter a valid date" },
            assignee: { required: "Please select an assignee" }
        },
        submitHandler: function(form) {
            const formData = new FormData(form);
            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    taskModal.modal('hide');
                    dataTable.ajax.reload();
                    showSuccessMsg(response.message)
                    form.reset();
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key + '_error').text(value[0]);
                        });
                    }
                }
            });
            return false;
        }
    });

    initializeDataTable();

    function showSuccessMsg(message){
        $('#successMsg').text(message);
        $('#successMsg').removeClass('d-none').fadeIn().delay(2000).fadeOut();
    }

    $('#importBtn').click(function (){
        $('#file').click()
    })

    $('#file').on('change', function() {
        if (this.files && this.files.length > 0) {
            $('#importForm').submit();
        }
    });

})
