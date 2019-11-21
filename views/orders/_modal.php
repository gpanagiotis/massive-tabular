<!-- Modal -->
<div class = "modal fade" id = "modal-item" role = "dialog">
    <div class = "modal-dialog">

        <!-- Modal content-->
        <div class = "modal-content">
            <div class = "modal-header">
                <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                <h4 class = "modal-title">Insert Item</h4>
            </div>
            <div class = "modal-body">                
                <label class = "control-label">select item</label>
                <input type = "text" class = "form-control" id = "item" autocomplete="off">


                <div class = "form-group">
                    <label for = "dep_name" class = "control-label">select quantity</label>
                    <div class = "">
                        <input type = "text" class = "description form-control" id = "quantity">
                    </div>
                </div>


            </div>
            <div class = "modal-footer">
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">Cancel</button>
                <button type = "button" class = "btn btn-default" id = 'ok-item-button'>Ok</button>
            </div>
        </div>

    </div>
</div>