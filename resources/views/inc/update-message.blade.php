<style>
/*   Where mobile css define */
  a.editListing, a.deleteListing {
    border-radius: 40px;
    background-color: rgba(0,0,0,0.1);
    padding: 7px;
    position: absolute;
  }
  a.editListing {
    top: 0;
    right: 50px;
  }
  a.deleteListing {
    top: 0;
    right: 10px;
  }
  a.editListing > span, a.deleteListing > span {

    width: 17px;
  }

  .modal-content {
    border-radius: 0px;
  }
  .modal-body {
    padding: 25px;
  }

  #update-form .modal-dialog {
    height: 50%;
    min-height: 420px; 
  }
  #update .modal-content {
    height: 100%;
  } 
  

  #update-form .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
    text-align: center;
  }
  #success-form .modal-dialog {
    height: 50%;
    min-height: 420px; 
  }
  #success .modal-content {
    height: 100%;
  } 
  
  #cancel-form .modal-dialog {
    height: 50%;
    min-height: 420px; 
  }
  #cancel .modal-content {
    height: 100%;
  }

  #success-form .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
    text-align: center;
  }
  #cancel-form .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
    text-align: center;
  }

/*  mobile css end */
  @media (min-width: 768px) {
    
    #update-form .modal-dialog {
      width: 600px;
      height: 50%;
      min-height: 383px
    }

    #update-form .modal-content {
        background-color: white;
        margin: 35% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 70%;
    	width: 525px;
        border: 2px solid #998967;
        border-radius: 0px;
    }

	#success-form .modal-dialog {
      width: 600px;
      height: 50%;
      min-height: 383px
    }

    #success-form .modal-content {
        background-color: white;
        margin: 35% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 70%;
    	width: 450px;
        border: 2px solid #998967;
        border-radius: 0px;
    }

    #cancel-form .modal-dialog {
      width: 600px;
      height: 50%;
      min-height: 383px
    }

    #cancel-form .modal-content {
        background-color: white;
        margin: 35% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 70%;
    	width: 400px;
        border: 2px solid #998967;
        border-radius: 0px;
    }

    .modal-content .modal-header {
      border-bottom: 0px solid #fff;
    }
    .modal-content .modal-body {
      padding: 0px!important;
    }
    

  .modal-content .modal-header > h2,h5 {
     color: #56616F;
  }
  
  }
  #update-form h2 {
     text-align: center;
     font-weight: 300;
     color: #56616F;
  }
 

  #update-form button{
     background-color: #998967;
     text-transform: uppercase;
     text-align: center;
     font-weight: 400;
     color: white;
     width: 139px;
     height: 30px;
     float: right;
     border: 0;
     box-shadow: none;
     margin-top: 5px;
     font-size: 10px;
     padding-top: 4px;
  }

  #success-form h2 {
     text-align: center;
     font-weight: 300;
     color: #56616F;
  }
 

  #success-form button{
    background-color: #998967;
     text-transform: uppercase;
     text-align: center;
     font-weight: 400;
     color: white;
     width: 139px;
     height: 30px;
     float: right;
     border: 0;
     box-shadow: none;
     margin-top: 5px;
     font-size: 10px;
     padding-top: 4px;
     margin-right: 28%;
  }

  #cancel-form h2 {
     text-align: center;
     font-weight: 300;
     color: #56616F;
  }
 

  #cancel-form button{
    background-color: #998967;
     text-transform: uppercase;
     text-align: center;
     font-weight: 400;
     color: white;
     width: 139px;
     height: 30px;
     float: right;
     border: 0;
     box-shadow: none;
     margin-top: 5px;
     font-size: 10px;
     padding-top: 4px;
     margin-right: 24%;
  }

 
  
</style>
{!! csrf_field() !!}


<div class="modal fade" id="update-form" tabindex="-1" role="dialog" aria-labelledby="updateForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Update Profile</h2>
          <h5>Are you sure you want to update your profile?</h5>
        </div>
        <div class="modal-body">
          <div class="pull-left">
          <button id="yes-button">Yes</button>
          </div>
          <div class="pull-right">
          <button id="cancel-button">No</button>
          </div>
        </div>
        </div>
      </div>
  </div>

<div class="modal fade" id="success-form" tabindex="-1" role="dialog" aria-labelledby="successForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Updated!</h2>
          <h5>Your profile has been updated.</h5>
        </div>
        <div class="modal-body">
          <button type="button" data-dismiss="modal">OK</button>
        </div>
       </div>
     </div>
 </div>

 <div class="modal fade" id="cancel-form" tabindex="-1" role="dialog" aria-labelledby="cancelForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Cancelled!</h2>
          <h5>User profile is not updated.</h5>
        </div>
        <div class="modal-body">
          <button type="button" class="close-all" data-dismiss="modal">OK</button>
        </div>
       </div>
     </div>
 </div>