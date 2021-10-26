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
            

              <div class="row justify-content-center">
                <div id="apper" style="position:relative; padding:10px; background-color: lightcyan;color: black;">
                      <form action="{{url('/doctorupdate',$data->id)}}" method="post" enctype="multipart/form-data">
                              @csrf
                             <div class="form-group">
                                  <label for="exampleInputEmail1">Doctor Name</label>
                                  <input type="text" name="name" class="form-control text-dark"  value="{{$data->name}}" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Phone</label>
                                  <input type="number" name="phone" class="form-control text-dark" value="{{$data->phone}}" required>
                              </div>

                               <div class="form-group">
                                  <label for="exampleInputEmail1">Select list (select one):</label>
                                     <select class="form-control text-dark" name="specialist" style="color:white;">
                                          <option value="{{$data->specialist}}">{{$data->specialist}}</option>
                                          <option value="skin">skin</option>
                                          <option value="heart">heart</option>
                                          <option value="eye">eye</option>
                                          <option value="nose">nose</option>
                                          
                                    
                                      </select>
                                 </div>

                               <div class="form-group">
                                  <label for="exampleInputEmail1">Room No</label>
                                  <input type="number" name="room_no" class="form-control text-dark" value="{{$data->room_no}}" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Doctor OldImage</label>
                                  <img src="doctorimage/{{$data->image}}" height="50px" width="50px">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Doctor Image</label>
                                  <input type="file" name="image" class="form-control text-dark" required>
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