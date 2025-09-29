
@if(isset($task))
    @method('PUT')
@endif

<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control"
           value="{{ old('title', $task->title ?? '') }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $task->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Due Date</label>
    <input type="date" name="due_date" class="form-control"
       value="{{ old('due_date', isset($task->due_date) ? $task->due_date : '') }}">

</div>
