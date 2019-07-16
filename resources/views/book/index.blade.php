@extends('layout')

@section('content')

<div class="col-sm-10">
    <h1>Contacts</h1>
</div>

<div class="row col-sm-12">
  <div class="col-sm-10">

    @include('book.search')
    
  </div>

  <div class="col-sm-2">
   <div class="pull-right">
      <a href="{{ route('phonebook.create')}}" class="btn btn-primary" title="Add new">
          <i class="fa fa-plus text-default"></i>
      </a>
    </div>
  </div>
  
</div>

<div class="row">
<div class="col-sm-12 pd-0 searchHTML">

    @include('partials.searchresult')



<div>
</div>
@endsection