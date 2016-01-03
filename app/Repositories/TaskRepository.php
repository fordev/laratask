<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
  /**
   * Obter todas as tarefas de um determinado usuário
   *
   * @param User $user
   * @return Colletion
   **/
  public function forUser(User $user)
  {
    return Task::where('user_id', $user->id)
                 ->orderBy('created_at', 'asc')
                 ->get();
  }
}
