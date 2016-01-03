<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  /**
   *
   * Mass Assignable
   *
   * @var array
   */
  protected $fillable = ['name'];

  /**
   * Obter o usuário que possui a tarefa
   **/
  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
