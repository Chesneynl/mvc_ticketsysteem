<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  public function TicketsByUserId($id)
  {
      return Ticket::where('user_id', $id)->get()->first();
  }

}
