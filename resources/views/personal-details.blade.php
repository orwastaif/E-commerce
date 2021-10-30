<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

   </head>
   <body>
      <div class="container">
         <h1></h1>
         <div class="row">
            <div class="col-md-9 col-md-offset-3">
               <div class="panel panel-default credit-card-box">
                  <div class="panel-heading display-table" >
                     <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Personal Details</h3>
                     </div>
                  </div>
                     <form
                        action="{{ route('payment')}}"
                        method="POST"
                        class="require-validation"
                        id="payment-form">
                        @csrf
                        
                      
                   
                        <div class='form-row row'>
                           <div class='col-xs-16 form-group required'>
                              <label class='control-label'>Surname</label> <input
                                 class='form-control' name="Surname"  type='text' required>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group required'>
                              <label class='control-label'>Name</label> <input
                                 class='form-control' name="Firstname" type='text' required>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group required'>
                              <label class='control-label'>Email</label> <input
                                 class='form-control' name="Email" type='text' required>
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group required'>
                              <label class='control-label'>Phone Number</label> <input
                                 class='form-control' name="Phone_number" type='text' required>
                           </div>
                           
                        </div>
                        
   
                        <div class="form-row row">
                           <div class="col-xs-12">
                              <button class="btn btn-primary btn-lg btn-block" type="submit">Proceed To Payment </button>
                           </div>
                        </div>
                       
                      
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>

</html>