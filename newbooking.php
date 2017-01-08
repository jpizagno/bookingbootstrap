<?php include('inc/header.php'); ?>

    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>

    <script>
    $(document).ready(function() {

                var dataTable = $('#dataTable').DataTable( {
                                            "processing": true,
                                            "serverSide": true,
                                            "ajax":{
                                                    url :"server-response.php", // json datasource
                                                    type: "post",  // method  , by default get
                                            }
                                    } );
            <!-- for selecting a row -->
            $('#dataTable tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    dataTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            } );
            $('#deleteSelectedBooking').click( function () {
                //var $name = dataTable.row('.selected').data()[10];
                //alert($name);

                var bookingnumber = dataTable.row('.selected').data()[10];
                var kreuzfahrt = dataTable.row('.selected').data()[0];  
                
                myData = {"kreuzfahrt":kreuzfahrt,"booking_number":bookingnumber};
                $.ajax({
                    url : "delete_data.php",
                    type: "POST",
                    data : myData,
                    success: function(data,status,xhr)
                     {
                        alert("deleted booking");
                     }
                }); 
                
                dataTable.row('.selected').remove().draw( false );
                
            } );
        
        <!-- unstorno a booking. i.e. set storno=0 -->
        $('#unStornoBooking').click( function () {
            var bookingnumber = dataTable.row('.selected').data()[10];
                var kreuzfahrt = dataTable.row('.selected').data()[0];  
                
                myData = {"kreuzfahrt":kreuzfahrt,"booking_number":bookingnumber,"storno":0};
                $.ajax({
                    url : "storno.php",
                    type: "POST",
                    data : myData,
                    success: function(data,status,xhr)
                     {
                        alert("UN storno booking");
                     }
                }); 
                
                dataTable.row('.selected').remove().draw( false );
        });
        
        <!-- storno a booking set storno=1 -->
        $('#stornoBooking').click( function () {
            var bookingnumber = dataTable.row('.selected').data()[10];
                var kreuzfahrt = dataTable.row('.selected').data()[0];  
                
                myData = {"kreuzfahrt":kreuzfahrt,"booking_number":bookingnumber,"storno":1};
                $.ajax({
                    url : "storno.php",
                    type: "POST",
                    data : myData,
                    success: function(data,status,xhr)
                     {
                        alert("storno booking");
                     }
                }); 
                
                dataTable.row('.selected').remove().draw( false );
        });
        
        <!-- clear all fields -->
        $('#clearFields').click( function () {å
            $("#kreuzfahrt").val(''); å
            $("#flug").val('');  
            $("#hotel").val('');        
            $("#versicherung").val('');
            $("#total").val(''); 
            $("#dayDeparture").val('');
            $("#monthDeparture").val(''); 
            $("#yearDeparture").val(''); 
            $("#surname").val('');     
            $("#firstname").val('');
            $("#bookingnumber").val('');
            $("#storno").val(''); 
            $("#bookingdate").val('');
            
        });
        
        
                <!-- removes the default search textinput -->
                $("#example_filter").css("display","none");

                $('.search-input-text').on( 'keyup click', function () {   // for text boxes
                    var i =$(this).attr('data-column');  // getting column index
                    var v =$(this).val();  // getting search input value
                    dataTable.columns(i).search(v).draw();
                } );
                $('.search-input-select').on( 'change', function () {   // for select box
                    var i =$(this).attr('data-column');
                    var v =$(this).val();
                    dataTable.columns(i).search(v).draw();
                } );

            });
    </script>

    <script>
        function bookThisCruise() {
            var kreuzfahrt = $("#kreuzfahrt").val();  
            var flug = $("#flug").val();  
            var hotel = $("#hotel").val();        
            var versicherung = $("#versicherung").val();
            var total = $("#total").val(); 
            var dayDeparture = $("#dayDeparture").val();
            var monthDeparture = $("#monthDeparture").val(); 
            var yearDeparture = $("#yearDeparture").val(); 
            var surname = $("#surname").val();     
            var firstname = $("#firstname").val();
            var bookingnumber = $("#bookingnumber").val();
            var storno = $("#storno").val(); 
            var bookingdate = $("#bookingdate").val(); 
            
           var myData={"kreuzfahrt":kreuzfahrt,"flug":flug,"hotel":hotel,"versicherung":versicherung,"total":total,"day_departure":dayDeparture,"month_departure":monthDeparture,"year_departure":yearDeparture,"surname":surname,"first_name":firstname,"booking_number":bookingnumber,"storno":storno,"booking_date":bookingdate};
             $.ajax({
                url : "insert_data.php",
                type: "POST",
                data : myData,
                success: function(data,status,xhr)
                 {
                    alert("inserted data");
                 }
             }); 
            
        }
    </script>

      <div class+"container page-content">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Please Enter a new booking below</h1>
                <form>
                  <div class="form-group">
                    <label for="exampleInputKreuzfahrt">Kreuzfahrt</label>
                    <input type="text" class="form-control" id="kreuzfahrt" placeholder="Kreuzfahrt">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFlug">Flug</label>
                    <input type="text" class="form-control" id="flug" placeholder="flug">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputHotel">Hotel</label>
                    <input type="text" class="form-control" id="hotel" placeholder="hotel">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputVersicherung">Versicherung</label>
                    <input type="text" class="form-control" id="versicherung" placeholder="versicherung">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTotal">Total</label>
                    <input type="text" class="form-control" id="total" placeholder="total">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDayDeparture">Day Departure</label>
                    <input type="text" class="form-control" id="dayDeparture" placeholder="dayDeparture">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputMonthDeparture">Month Departure</label>
                    <input type="text" class="form-control" id="monthDeparture" placeholder="monthDeparture">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputYearDeparture">Year Departure</label>
                    <input type="text" class="form-control" id="yearDeparture" placeholder="yearDeparture">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputSurname">Surname</label>
                    <input type="text" class="form-control" id="surname" placeholder="surname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFirstName">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="firstname">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputBookingNumber">Booking Number</label>
                    <input type="text" class="form-control" id="bookingnumber" placeholder="bookingnumber">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputStorno">Storno</label>
                    <input type="text" class="form-control" id="storno" placeholder="storno">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputBookingDate">Booking Date</label>
                    <input type="text" class="form-control" id="bookingdate" placeholder="bookingdate">
                  </div>
                </form>
            </div>
          </div>
          <div class="row">
              <div class="col-md-8 col-md-offset-1">
                  <button class="btn btn-default" type="submit" onclick="bookThisCruise()">Book this cruise</button>
                  <button class="btn btn-default" type="submit" id="deleteSelectedBooking">Delete Selected Booking</button>
                  <button class="btn btn-default" type="submit" id="stornoBooking">Storno Selected Booking</button>
                  <button class="btn btn-default" type="submit" id="clearFields">Clear Fields</button>
                  <button class="btn btn-default" type="submit" id="unStornoBooking">UN-Storno Selected Booking</button>
              </div>
          </div>
          
          <div class="row">
            <table id="dataTable" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
            <thead>
            <tr>
                <th>Kreuzfahrt</th>
                <th>Flug</th>
                <th>Hotel</th>
                <th>Versicherung</th>
                <th>Total</th>
                <th>Day Departure</th>
                <th>Month Departure</th>
                <th>Year Departure</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Booking Number</th>
                <th>Storno</th>
                <th>Booking Date</th>
            </tr>
            </thead>
            <thead>
            <tr>    
                <td>
                    <select data-column="0"  class="search-input-select">
                        <option value="">(Select a range)</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-1000">100 - 1000</option>
                        <option value="1000-2000">1000 - 2000</option>
                    </select>
                </td> 
                <td>
                    <select data-column="1"  class="search-input-select">
                        <option value="">(Select a range)</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-1000">100 - 1000</option>
                        <option value="1000-10000">1000 - 10000</option>
                    </select>
                </td> 
                <td>
                    <select data-column="2"  class="search-input-select">
                        <option value="">(Select a range)</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-1000">100 - 1000</option>
                        <option value="1000-10000">1000 - 10000</option>
                    </select>
                </td> 
                <td>
                    <select data-column="3"  class="search-input-select">
                        <option value="">(Select a range)</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-1000">100 - 1000</option>
                        <option value="1000-10000">1000 - 10000</option>
                    </select>
                </td> 
                <td>
                    <select data-column="4"  class="search-input-select">
                        <option value="">(Select a range)</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-1000">100 - 1000</option>
                        <option value="1000-10000">1000 - 10000</option>
                    </select>
                </td>  
                <td><input type="text" data-column="5" class="search-input-text" ></td> 
                <td><input type="text" data-column="6" class="search-input-text" ></td> 
                <td><input type="text" data-column="7" class="search-input-text" ></td> 
                <td><input type="text" data-column="8" class="search-input-text" ></td> 
                <td><input type="text" data-column="9" class="search-input-text" ></td>  
                <td><input type="text" data-column="10" class="search-input-text" ></td>  
                <td><input type="text" data-column="11" class="search-input-text" ></td> 
                <td>
                    <select data-column="12"  class="search-input-select">
                        <option value="">(Select a range)</option>
                        <option value="0-100">0 - 100</option>
                        <option value="100-1000">100 - 1000</option>
                        <option value="1000-10000">1000 - 10000</option>
                    </select>
                </td> 
                
            </tr>
            </thead>
        </table>
          </div>
              
      </div> 
      
  </body>
</html>
