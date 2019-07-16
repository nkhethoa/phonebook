<form action="{{ route('phonebook.destroy', $contact->id)}}" method="post">
    @method('DELETE')
    @csrf
    <button class="btn btn-default" type="submit" title="Delete">
        <i class="fa fa-trash text-danger"></i>
    </button>
</form>