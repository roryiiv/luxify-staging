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
  
  #update-product-form .modal-dialog {
    height: 50%;
    min-height: 420px; 
  }
  #update-product .modal-content {
    height: 100%;
  }

  #update-product-form .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
    text-align: center;
  }

  #add-product-form .modal-dialog {
    height: 50%;
    min-height: 420px; 
  }
  #add-product .modal-content {
    height: 100%;
  }

  #add-product-form .modal-content .modal-header > h5 {
    font-weight: 300;
    font-size: 15px; 
    text-align: center;
  }

/*  mobile css end */
  @media (min-width: 768px) {

    #update-product-form .modal-dialog {
      width: 600px;
      height: 50%;
      min-height: 383px
    }

    #update-product-form .modal-content {
        background-color: white;
        margin: 40% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 55%;
        width: 510px;
        border: 2px solid #998967;
        border-radius: 0px;
    }

    #add-product-form .modal-dialog {
      width: 600px;
      height: 50%;
      min-height: 383px
    }

    #add-product-form .modal-content {
       background-color: white;
        margin: 40% auto;
        padding: 36px 73px;
        max-width: 800px;
        height: 55%;
        width: 493px;
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
  

  #update-product-form h2 {
     text-align: center;
     font-weight: 300;
     color: #56616F;
  }
 

  #update-product-form button{
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
     margin-right: 31%;
  }

  #add-product-form h2 {
     text-align: center;
     font-weight: 400;
     color: #56616F;
  }
 

  #add-product-form button{
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
     margin-right: 33%;
  }

 
  
</style>
{!! csrf_field() !!}


<div class="modal fade" id="update-product-form" tabindex="-1" role="dialog" aria-labelledby="updateProductForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Good Job!</h2>
          <h5>Your item has been submitted for approval.</h5>
        </div>
        <div class="modal-body">
          <button type="button" data-dismiss="modal">OK</button>
        </div>
       </div>
     </div>
 </div>

 <div class="modal fade" id="add-product-form" tabindex="-1" role="dialog" aria-labelledby="addProductForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2>New Listing Created!</h2>
          <h5>Admin will review your listing soon.</h5>
        </div>
        <div class="modal-body">
          <button type="button" data-dismiss="modal">OK</button>
        </div>
       </div>
     </div>
 </div>

 