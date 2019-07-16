<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['phonebookid', 'email', 'phonenumber'];

    public function scopeWhereEditContact($query,$id)
    {
        return $this::where('contacts.phonebookid', $id)
                    ->first();            
    }
}
