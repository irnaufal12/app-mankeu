@extends ('index')
@section ('content')

<h2>LOGIN</h2>
    @if(session()->has('fail')) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('fail')}}
        </div>
    
    @endif
    @if(session()->has('success')) 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
        </div>
    
    @endif
    <form action="{{route('login-post')}}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email"></br>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        </br><label for="password">Password</label>
        <input type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password"></br>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endSection