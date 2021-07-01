
    <div class="modal fade" id="myworkspaceModal">
        <div class="modal-dialog">
          <div class="modal-content">


        <div class="modal-header">{{ __("Edit Workspace") }}</div>
         <div class="modal-body">
            <form id="" action="{{ url('workspace/update') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                @csrf
                <input type="hidden" name="workspace_id" id="workspace_id" value="">
                <div class="form-group">
                    <label>{{ __("Workspace Name") }}</label>
                    <input type="text" name="workspace_name" id="workspace_name" class="form-control" value="" required>
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
                <input type="submit" name="submit" class="btn btn-success"  value="submit"/>
            
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </div>
        </div>
        </form>
  

          </div>
           </div>
        </div>
    <!-- ./MODAL -->