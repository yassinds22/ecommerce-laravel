<center><h1>hello</h1></center>
@if(Auth::check())
<center><h1>my Account</h1></center>
<center><h1><a href="{{route('logout')}}">logout</a></h1></center>
    
@else
<center><h1>login</h1></center>
    
@endif
