
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">


        <div class="modal-header">{{ __("Add New Workspace") }}</div>
         <div class="modal-body">
            <form id="add_user_form" action="{{ url('workspace/store') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                @csrf
                
                <div class="form-group">
                    <label>{{ __("Workspace Name") }}</label>
                    <input type="text" name="workspace_name" class="form-control" value="" required>
                </div>
           
                <div class="form-group">
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header"></div>
                        <ul class="list">
                            <li class=""></li>
                        </ul>
                    </div>
                </div>
        </div>
              
            <div class="actions">
                <div class="modal-footer">
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                {{-- <button class="btn btn-success" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Save') }}</button> --}}
                <button type="submit" class="btn btn-success">Submit</button>
            
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
        </form>
  

          </div>
           </div>
        </div>
    <!-- ./MODAL -->


    