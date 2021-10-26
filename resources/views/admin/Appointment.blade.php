<!DOCTYPE html>
<html lang="en">
  <head>
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
            <div class="row">
              <div class="col-sm-3" style="font-size: xx-large;">
                 <h1 >Appointment</h1>
                </div>
              </div>
              

              <div class="row justify-content-center">
                <div id="apper" style="position:relative; padding:10px; display:none; background-color: lightcyan;color: black;">
                      <form action="{{url('/doctorupload')}}" method="post" enctype="multipart/form-data">
                              @csrf
                             <div class="form-group">
                                  <label for="exampleInputEmail1">Doctor Name</label>
                                  <input type="text" name="name" class="form-control text-dark"  placeholder="Enter Doctor Name" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Phone</label>
                                  <input type="number" name="phone" class="form-control text-dark" placeholder="Enter phone number" required>
                              </div>

                               <div class="form-group">
                                  <label for="exampleInputEmail1">Select list (select one):</label>
                                     <select class="form-control text-dark" name="specialist" style="color:white;">
                                          <option>--select--</option>
                                          <option value="skin">skin</option>
                                          <option value="heart">heart</option>
                                          <option value="eye">eye</option>
                                          <option value="nose">nose</option>
                                          
                                    
                                      </select>
                                 </div>

                               <div class="form-group">
                                  <label for="exampleInputEmail1">Room No</label>
                                  <input type="number" name="room_no" class="form-control text-dark" placeholder="Enter Room No" required>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Doctor Image</label>
                                  <input type="file" name="image" class="form-control text-dark" required>
                              </div>
                             
                              <div class="form-group">
                                  <label for="exampleInputEmail1"></label>
                                  <input type="submit" name="submit" class="form-control"><br>
                                  <button type="button" id="close" class="btn btn-danger">Close</button>
                              </div>
                             
                          
                        </form>
                 
                      </div>
             
                 </div>
              <div class="row py-3 justify-content-center">
                     <div style="position:relative; display: ;">
                            <table bgcolor="grey">
                              <tr>
                                <th style="padding: 20px;">CustomarName</th>
                                <th style="padding: 20px;">Email</th>
                                <th style="padding: 20px;">Phone</th>
                                <th style="padding: 20px;">Doctor Name</th>
                                <th style="padding: 20px;">Date</th>
                                <th style="padding: 20px;">Message</th>
                                <th style="padding: 20px;">Status</th>
                                <th style="padding: 20px;">Approve</th>
                                <th style="padding: 20px;">Cancel</th>
                                <th style="padding: 20px;">Send Mail</th>

                                
                              </tr>
                             @foreach($data as $data)

                                <tr align="center" bgcolor="blue">
                                  <td>{{$data->name}}</td>
                                  <td>{{$data->email}}</td>
                                  <td>{{$data->phone}}</td>
                                  <td>{{$data->doctor}}</td>
                                  <td>{{$data->date}}</td>
                                  <td>{{$data->message}}</td>
                                  <td>{{$data->status}}</td>
                                  <td><a href="{{url('/approve',$data->id)}}" class="btn btn-success">Approve</a></td>
                                  <td><a href="{{url('/cancel',$data->id)}}" class="btn btn-danger">Cancel</a></td>
                                  <td><a href="{{url('/emailview',$data->id)}}" class="btn btn-secondary">Send Mail</a></td>
                                  
                                </tr>
                             @endforeach
                            </table>
                     </div>
              </div>  


          </div>
      </div>  
     
  </div>
  <script type="text/javascript">
      $("#adddoctors").click(function(){
          $("#apper").show();
      });
       $("#close").click(function(){
          $("#apper").hide();
      });

  </script>
  @include('admin.homescript')
    <!-- End custom js for this page -->
  </body>
</html>