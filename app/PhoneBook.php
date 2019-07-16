<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    protected $fillable = ['firstname', 'lastname', 'phonenumber', 'email'];

   
    /**
     * Get all contacts query
     *
     * @param [type] $query
     * @return void
     */
    public function scopeWherePhone($query)
    {
        return $this::join('contacts', 'phone_books.id', '=', 'contacts.phonebookid')
                ->get();
    }

    /**
     * Get specific contact [all field from both atables] query
     *
     * @param [type] $query
     * @param [type] $id
     * @return void
     */
    public function scopeWhereEdit($query,$id)
    {
        return $this::where('phone_books.id', $id)
            ->join('contacts', 'contacts.phonebookid','phone_books.id')
            ->first();
    }


    


}
