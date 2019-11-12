@include('include.head')
      <div class="container">
         <div class="col-md-8 col-sm-offset-2">
         <br><br>
         <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Reserve an Account 
                  <div class="form-group" style="float:right; margin-top:-8px">
                        <a href="{{url('logout')}}" type="button" class="btn btn-danger">Logout</a>
                    </div> 
               </div>
                    @yield('content')
         </div>
           
         </div>
      </div>
@include('include.footer')
  