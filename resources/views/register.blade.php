@extends ('index')
@section ('content')

<h2>REGISTRASI</h2>
    @if(session()->has('success')) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
        </div>
    
    @endif
    <form action="{{route('register-post')}}" method="POST">
        @csrf
        <label for="name">Nama</label>
        <input type="text" name="name" placeholder="Name"></br>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email"></br>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password"></br>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endSection