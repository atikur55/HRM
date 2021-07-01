
    <div class="modal fade" id="myeditModal">
        <div class="modal-dialog">
          <div class="modal-content">


        <div class="modal-header">{{ __("Edit Project") }}</div>
         <div class="modal-body">
            <form id="add_user_form" action="{{ url('project/update') }}" class="ui form add-user" method="post" accept-charset="utf-8">
                @csrf
                <input type="hidden" id="project_id" name="project_id" value="">
                <div class="form-group">
                    <label>{{ __("Project Name") }}</label>
                    <input id="project_name" type="text" name="project_name" class="form-control" value="" required>
                </div>

                 <div class="form-group">
                    <label>{{ __("Project Description") }}</label>
                    <input id="project_description" type="text" name="project_description" class="form-control" value="" >
                </div>

                 <div class="form-group">
                    <label>{{ __("Project Start Date") }}</label>
                    <input id="project_start_date" type="date" name="project_start_date" class="form-control" value="" >
                </div>

                 <div class="form-group">
                    <label>{{ __("Project End Date") }}</label>
                    <input id="project_end_date" type="date" name="project_end_date" class="form-control" value="" >
                </div>

                 <div class="form-group">
                    <label>{{ __("Project Budget") }}</label>
                    <input id="project_budget" type="number" name="project_budget" class="form-control" value="" >
                </div>

                <div class="form-group">
                    <label>{{ __("Project Assign to") }}</label>
                    {{-- <input type="text" name="assign_to" class="form-control" value="" > --}}
                    {{-- <select class="livesearch form-control" name="livesearch"></select> --}}
                    <br>
                    <select  style="width:100%!important;background-color:#1b2e4b!important;color:black!important" class="update_livesearch custom-select form-control form-control-lg" id="update_tag_list project_assign_to" name="users_list[]"  multiple></select>
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
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                {{-- <button class="btn btn-success" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Save') }}</button> --}}
             
                <button type="submit" class="btn btn-success" >Submit</button>
                <button type="button" class="btn btn-danger"  data-dismiss="modal" onclick="location.reload()" >Close</button>
            </div>
            
        </div>
        </div>
        </form>
  

          </div>
           </div>
        </div>
       
    <!-- ./MODAL -->
