<table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Email</td>
          <td>Phone Number</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>     
     
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->firstname}}</td>
            <td>{{$contact->lastname}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phonenumber}}</td>

            <td>
                <a href="{{ route('phonebook.edit',$contact->id)}}" class="btn btn-default" title="Edit">
                  <i class="fa fa-edit text-success"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('phonebook.destroy', $contact->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-default" type="submit" title="Delete">
                    <i class="fa fa-trash text-danger"></i>
                  </button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
  </table>