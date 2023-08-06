@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (Session::has('notif.success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('notif.success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
            <a href="{{route('contacts.create')}}" class="btn btn-success mt-5">
               crear
            </a>

        </div>
    </div>
</div>
</div>  
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>IP</th>


                        <th colspan="3" class="text-center">Accions</th>


                    </tr>
                </thead>
                <tbody>
                     @foreach ($contacts as $contact)
                         <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>+{{$contact->country_code->phone_code.$contact->phone}}</td>
                            <td>{{$contact->ipAdress}}</td>
                            <td>
                                
                                    <a href="" class="btn btn-success btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                             
                            </td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm show_confirm">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                         </tr>
                     @endforeach
                </tbody>
            </table>


        </div>
     
    </div>
</div>
@endsection