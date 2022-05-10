@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp



@if(!auth()->user()->image)
                    <img class="img-fluid ms-2 "style="border-radius: 50%" src="/images/0809-250x250.jpg" width="35">
                    @else 
                     <img class="img-fluid ms-2"style="border-radius: 50%" src="/profile/{{auth()->user()->image}}" width="35">
                    @endif
                    <span class="ms-2 fs-6 fw-bold"> {{auth()->user()->name}}</span>
                    <ul class="list-group list-group-flush">

                <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block w-50 my-2">Home</a>


<a href="" class="btn btn-primary btn-sm btn-block w-50 my-1">Change Password </a>

<a href="{{ route('my.booking') }}" class="btn btn-primary btn-sm btn-block w-50 my-1">Reservas</a>

<a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block w-50 my-1">Logout</a>

				</ul>

			