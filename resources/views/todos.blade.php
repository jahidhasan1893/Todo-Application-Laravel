<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todos | Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-top: 50px;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 20px;
            font-size: 24px;
            font-weight: 600;
            border-radius: 15px 15px 0 0 !important;
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
        }
        .btn-primary {
            background: #4f46e5;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }
        .todo-item {
            background: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
        }
        .todo-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .todo-actions {
            display: flex;
            gap: 10px;
        }
        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        .completed {
            text-decoration: line-through;
            opacity: 0.7;
        }
        .modal-content {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .modal-header {
            border-bottom: 1px solid #eee;
            padding: 20px;
            background: #fff;
            border-radius: 15px 15px 0 0;
        }
        .modal-body {
            padding: 30px;
        }
        .modal-footer {
            border-top: 1px solid #eee;
            padding: 20px;
            background: #fff;
            border-radius: 0 0 15px 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>My Todo List</span>
                    <a href="/logout" class="btn btn-outline-primary btn-sm">Logout</a>
                </div>

                <div class="card-body">
                    <!-- Add Todo Form -->
                    <form method="POST" action="/todos" class="mb-4">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="title" placeholder="Add a new todo..." required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                    </form>

                    <!-- Todo List -->
                    <div class="todo-list">
                        <!-- Sample Todo Items -->
                        <div class="todo-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" class="form-check-input me-3">
                                <span>Complete the project documentation</span>
                            </div>
                            <div class="todo-actions">
                                <button class="btn btn-info btn-action" data-bs-toggle="modal" data-bs-target="#editTodoModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-action">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>

                        <div class="todo-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <input type="checkbox" class="form-check-input me-3" checked>
                                <span class="completed">Review pull requests</span>
                            </div>
                            <div class="todo-actions">
                                <button class="btn btn-info btn-action" data-bs-toggle="modal" data-bs-target="#editTodoModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-action">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal fade" id="editTodoModal" tabindex="-1" aria-labelledby="editTodoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTodoModalLabel">Edit Todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/todos/update" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="todo_id" id="edit_todo_id">
                    <div class="mb-3">
                        <label for="edit_todo_title" class="form-label">Todo Title</label>
                        <input type="text" class="form-control" id="edit_todo_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_todo_status" name="completed">
                            <label class="form-check-label" for="edit_todo_status">
                                Mark as completed
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Add this script before closing body tag
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editTodoModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const todoId = button.getAttribute('data-todo-id');
            const todoTitle = button.getAttribute('data-todo-title');
            const todoStatus = button.getAttribute('data-todo-status');
            
            const modalTodoId = editModal.querySelector('#edit_todo_id');
            const modalTodoTitle = editModal.querySelector('#edit_todo_title');
            const modalTodoStatus = editModal.querySelector('#edit_todo_status');
            
            modalTodoId.value = todoId;
            modalTodoTitle.value = todoTitle;
            modalTodoStatus.checked = todoStatus === '1';
        });
    });
</script>

</body>
</html>