<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ✅ عرض كل المهام للمستخدم الحالي
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // ✅ صفحة إنشاء مهمة جديدة
    public function create()
    {
        return view('tasks.create');
    }

    // ✅ حفظ المهمة
    public function store(TaskRequest $request)
    {
        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // ✅ صفحة عرض مهمة
    public function show($id)
    {
        $task= Task::findOrFail($id);
        $this->authorizeTask($task);
        return view('tasks.show', compact('task'));
    }

    // ✅ صفحة تعديل مهمة
    public function edit($id)
    {
        $task= Task::findOrFail($id);
        $this->authorizeTask($task);
        return view('tasks.edit', compact('task'));
    }

    // ✅ تحديث مهمة
    public function update(TaskRequest $request, $id)
    {

        $task= Task::findOrFail($id);
        $this->authorizeTask($task);

        $task->update([
            'title'       => $request->title,
            'description' => $request->description,
            'due_date'    => $request->due_date,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // ✅ حذف مهمة
    public function destroy($id)
    {
        $task= Task::findOrFail($id);
        $this->authorizeTask($task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
    public function status(Request $request){
        $task = Task::findOrFail($request->id);
        $this->authorizeTask($task);
        $task->update([
            'status'=>$request->status
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task status updated successfully.');
    }
    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
    
}
