<div tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade bs-example-modal">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="myModalLabel" class="modal-title">Send Message for Support</h4>
            </div>
            <div class="modal-body">
                <form name="" action="/dashboard/support" method="post">
                    <div class="form-group">
                        <label for="supportSubject">Subject</label>
                        <input type="text" id="supportSubject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="supportMessage">Message</label>
                        <textarea name="supportMessage" id="supportMessage" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success btn-lg btn-raised">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
