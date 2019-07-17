<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PhoneBook;
use App\Contact;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contacts = PhoneBook::wherePhone();

        return view('book.index', compact('contacts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new PhoneBook();

        return view('book.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'firstName' =>  'required',
            'phone'     =>'required|digits:10',
            'email'     =>  'email'
        ]);

        //add new record
        $details = new PhoneBook([
            'firstname'     => $request->get('firstName'),
            'lastname'      => $request->get('lastName'),

        ]);
        $details->save();

        $contact = new Contact([
            'phonebookid'   => $details->id,
            'email'         => $request->get('email'),
            'phonenumber'   => $request->get('phone'),
        ]);
        $contact->save();

        return redirect('phonebook')->with('success', 'Contact saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = PhoneBook::WhereEdit($id);
       
        //check if not null
        if ($contact != NULL) {
            return view('book.create', compact('contact'));
        }
        //return to default page with error message
        return redirect('phonebook')->with('error', 'Resource not found!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
            'firstName' =>'required',
            'phone'     =>'required|digits:10'
        ]);
        
        //save the updates to phone_books table
        $details = PhoneBook::WhereEdit($id);
        $details->firstname     =  $request->get('firstName');
        $details->lastname      = $request->get('lastName');
        $details->save();

        //save the updates to contact table
        $contact = Contact::WhereEditContact($id);
        $contact->email         = $request->get('email');
        $contact->phonenumber   = $request->get('phone');
        $contact->save();

        return redirect('phonebook')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = PhoneBook::find($id);

        if ($contact != NULL) {
            $contact->delete();
            return redirect('phonebook')->with('success', 'Contact deleted!');
        }else {
            return redirect('phonebook')->with('error', 'Record not found!');
        }

    }

    /**
     * Search method 
     * This method will accept the user request based on the search criteria
     * The method will then return a JSON formatted string VIEW
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        //user input
        $searchQry = $request->get('value');

        $contacts = DB::table('phone_books')
                    ->join('contacts', 'contacts.phonebookid','phone_books.id')
                    ->where('firstname',        'like', '%' .$searchQry.'%')
                    ->orWhere('lastname',       'like', '%' .$searchQry.'%')
                    ->orWhere('phonenumber',    'like', '%' .$searchQry.'%')
                    ->orWhere('email',          'like', '%' .$searchQry.'%')
                    ->get();

        $returnHTML = view('book.showcontacts',compact('contacts'))->render();

        return response()->json( ['success' => true, 'html'=>$returnHTML] );

    }
}
