@extends('layout')

@section('content')

<div class="col-sm-10 pl-0">
    <h1>Contacts</h1>
</div>

<div class="row col-md-12">
  <div class="col-xs-12 col-md-8 pl-0 pb-1">
    <div class="input-group pull-left pl-0">
      <input class="form-control py-2" 
              type="text" 
              placeholder="Search Contact" 
              value="" 
              id="search">
    </div>
  </div>

  <div class="col-xs-12 col-md-2 pl-0">
   <div class="pull-right">
      <a href="{{ route('phonebook.create')}}" class="btn btn-primary" title="Add new">
          <i class="fa fa-plus text-default"></i>
      </a>
    </div>
  </div>
  
</div>

<div class="row">
  <div class="col-sm-12 pd-0 searchHTML">
    {{-- include the search results or contact display --}}
    @include('book.showcontacts')



<div>
</div>
@endsection