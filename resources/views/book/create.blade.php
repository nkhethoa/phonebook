@extends('layout')

@section('content')

    <h1>{{ isset($contact->id) ? 'Update Contact' : 'Add Contact' }}</h1>

    <form action = "{{ !isset($contact->id) ? route('phonebook.store') : route('phonebook.update',$contact->id) }}" method="post">
        @if (isset($contact->id))
            @method('PATCH')
        @endif
        @csrf
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-success"></i></div>
                    </div>
                    <input type="text" 
                            class="form-control" 
                            id="firstName" 
                            value="{{ old('firstName') ?? $contact->firstname }}" 
                            name="firstName" 
                            placeholder="Contact First Name" >
                </div>
                @if($errors->first('firstName')) 
                    <span class="alert alert-danger">
                        {{ $errors->first('firstName') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-success"></i></div>
                    </div>
                    <input type="text" 
                            class="form-control" 
                            id="lastName" 
                            value="{{ old('lastName') ?? $contact->lastname }}" 
                            name="lastName" 
                            placeholder="Contact Last Name" >
                </div>
                @if($errors->first('lastName')) 
                    <span class="alert alert-danger">
                        {{ $errors->first('lastName') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-phone text-success"></i></div>
                    </div>
                    <input type="text" 
                            class="form-control" 
                            id="phone" 
                            value="{{ old('phone') ?? $contact->phonenumber }}"
                            name="phone" 
                            placeholder="0511234567" >
                </div>
                @if($errors->first('phonenumber')) 
                    <span class="alert alert-danger">
                        {{ $errors->first('phonenumber') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-success"></i></div>
                    </div>
                    <input type="text" 
                            class="form-control" 
                            id="email" 
                            value="{{ old('email') ?? $contact->email }}"
                            name="email" 
                            placeholder="name@host.com" >
                </div>
                @if($errors->first('email')) <span class="alert alert-danger">{{ $errors->first('email') }}</span>@endif
            </div>

            <div class="text-center">
                <input type="submit" 
                        value="{{ isset($contact->id) ? 'Update' : 'Add' }}" 
                        class="btn btn-primary btn-block rounded-0 py-2">
            </div>

    </form>

@endsection