<!-- The Modal -->
<div class="modal fade" id="myModal_leave2">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">


                <h3>{{ __("My Leave") }}</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

    <div class="modal-body">
        <form action="" class="ui form" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label>{{ __("Employee") }}</label>
            <input type="text" class="form-control employee uppercase readonly" value="" readonly="">
        </div>
        <div class="form-group">
            <label>{{ __("Leave Type") }}</label>
            <input type="text" class="form-control leavetype uppercase readonly" value="" readonly="">
        </div>
        <div class="two form-groups">
            <div class="form-group">
                <label for="">{{ __("Leave From") }}</label>
                <input type="text" class="form-control leavefrom readonly" value="" readonly="" />
            </div>
            <div class="form-group">
                <label for="">{{ __("Leave To") }}</label>
                <input type="text" class="form-control leaveto readonly" value="" readonly=""/>
            </div>
        </div>
        <div class="form-group">
            <label for="">{{ __("Return Date") }}</label>
            <input type="text" class="form-control returndate readonly" value="" readonly=""/>
        </div>
        <div class="form-group">
            <label>{{ __("Reason") }}</label>
            <textarea rows="5" class="form-control reason uppercase readonly" value="" readonly=""></textarea>
        </div>
        <div class="form-group">
            <label for="">{{ __("Status") }}</label>
            <input type="text" class="form-control status readonly" value="" readonly=""/>
        </div>
    </div>
    <div class="actions">
        <button  type="button" class="btn btn-danger" data-dismiss="modal"><i class="ui times icon"></i> {{ __("Close") }}</button>
    </div>
    </form>  


</div>
</div>
</div>
    