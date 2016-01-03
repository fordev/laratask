<?php

namespace App\Http\Controllers;


use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
  /**
   * Instancia do repositorio de tarefas
   *
   * @var TaskRepository
   **/
  protected $tasks;

  /**
  * Cria uma nova instancia do controller
  *
  * @param TaskRepository $task
  * @return void
  **/
  public function __construct(TaskRepository $tasks)
  {
    $this->middleware('auth');

    $this->tasks = $tasks;
  }
  /**
   * Exibir todas as tarefas do usuário
   *
   * @param Request $request
   * @return Response
   **/
  public function index(Request $request)
  {
    return view('tasks.index', [
      'tasks' => $this->tasks->forUser($request->user()),
    ]);
  }

  /**
   * Criar uma nova tarefa
   *
   * @param Request $request
   * @return Response
   **/
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|max:255',
    ]);

    $request->user()->tasks()->create([
      'name' => $request->name,
    ]);

    return redirect('/tasks');
  }

  /**
   * Deleta uma tarefa do usuário
   *
   * @param Request $request
   * @param Task $task
   * @return Response
   **/
  public function destroy(Request $request, Task $task)
  {
    $this->authorize('destroy', $task);

    $task->delete();

    return redirect('/tasks');
  }
}
