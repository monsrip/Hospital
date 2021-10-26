<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- plugins:css -->
    @include('admin.homecss')
  </head>
  <body>
    <div class="container-scroller">
      
      @include('admin.sitebar')
     @include('admin.navbar')
     

     <div class="main-panel text-white" >
          <div class="content-wrapper">
            
            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" data-dismiss="alert" class="close">X</button>
                {{session()->get('message')}}

              </div>
              @endif
              
              <div class="row justify-content-center">
                <div id="apper" style="position:relative; padding:10px; background-color: lightcyan;color: black;">
                      <form action="{{url('/sendemail',$data->id)}}" method="post" >
                              @csrf
                             <div class="form-group">
                                  <label for="exampleInputEmail1">Greeting</label>
                                  <input type="text" name="name" class="form-control text-dark"  required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Body</label>
                                  <input type="text" name="body" class="form-control text-dark"  required>
                              </div>

                               

                               <div class="form-group">
                                  <label for="exampleInputEmail1">Action Text</label>
                                  <input type="text" name="actiontext" class="form-control text-dark" required>
                              </div>


                              <div class="form-group">
                                  <label for="exampleInputEmail1">Action Url</label>
                                  <input type="text" name="actionurl" class="form-control text-dark" required>
                              </div>

                              <div class="form-group">
                                  <label for="exampleInputEmail1">End Part</label>
                                  <input type="text" name="endpart" class="form-control text-dark" required>
                              </div>
                              
                              
                             
                              <div class="form-group">
                                  <label for="exampleInputEmail1"></label>
                                  <input type="submit" name="submit" class="form-control"><br>
                                  
                              </div>
                             
                          
                        </form>
                 
                      </div>
             
                 </div>
              

          </div>
      </div>  
     
  </div>
  
  @include('admin.homescript')
    <!-- End custom js for this page -->
  </body>
</html>




