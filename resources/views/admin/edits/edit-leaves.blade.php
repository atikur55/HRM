@extends('layouts.default')
    
    @section('meta')
        <title>Edit Leave of Absence | Workday Time Clock</title>
        <meta name="description" content="Workday edit employee leave of absence.">
    @endsection 

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Edit Leave") }}</h2>
            </div>    
        </div>

        <div class="row widget-content widget-content-area br-6">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-content">
                @if ($errors->any())
                <div class="ui error message">
                    <i class="close icon"></i>
                    <div class="header">{{ __("There were some errors with your submission") }}</div>
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="edit_leave_form" action="{{ url('leaves/update') }}" class="ui form" method="post" accept-charset="utf-8">
                @csrf
                    <div class="form-group">
                        <label>{{ __("Employee") }}</label>
                        <input style="width:100%" type="text" class="readonly form-control"  readonly="" value="@isset($l->employee){{ $l->employee }}@endisset">
                    </div>
                    <div class="form-group">
                        <label>{{ __("Leave Type") }}</label>
                        <input style="width:100%" type="text" class="readonly form-control"  readonly="" value="@isset($l->type){{ $l->type }}@endisset">
                    </div>
                    <div class="two form-groups">
                        <div class="form-group">
                            <label for="">{{ __("Leave From") }}</label>
                            <input style="width:100%" type="text" class="readonly form-control"  readonly="" value="@isset($l->leavefrom){{ $l->leavefrom }}@endisset"/>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __("Leave To") }}</label>
                            <input style="width:100%" type="text" class="readonly form-control"  readonly="" value="@isset($l->leaveto){{ $l->leaveto }}@endisset"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __("Return Date") }}</label>
                        <input id="returndate" style="width:100%" type="text" class="readonly form-control"  readonly="" value="@isset($l->returndate){{ $l->returndate }}@endisset"/>
                    </div>
                    <div class="form-group">
                        <label>{{ __("Reason") }}</label>
                        <textarea class="form-control uppercase readonly" readonly="" rows="5">@isset($l->reason){{ $l->reason }}@endisset</textarea>
                    </div>
                    <div class="form-group">
                        <p class="ui horizontal divider tiny sub header">{{ __("Manager Privilege") }}</p>
                    </div>
                    <div class="form-group">
                        <label>{{ __("Status") }}</label>
                        <select class="ui dropdown uppercase form-control" name="status">
                            <option value="Approved" @isset($l->status) @if($l->status == 'Approved') selected @endif @endisset>Approved</option>
                            <option value="Pending" @isset($l->status) @if($l->status == 'Pending') selected @endif @endisset>Pending</option>
                            <option value="Declined" @isset($l->status) @if($l->status == 'Declined') selected @endif @endisset>Declined</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __("Add Comment (Optional)") }}</label>
                        <textarea name="comment" class="form-control uppercase" rows="5">@isset($l->comment){{ $l->comment }}@endisset</textarea>
                    </div>
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header"></div>
                        <ul class="list">
                            <li class=""></li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" class="readonly form-control"  readonly="" name="id" value="@isset($e_id){{ $e_id }}@endisset">
                    <button class="btn btn-success ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                    <a href="{{ url('leaves') }}" class="btn btn-danger ui black grey small button"><i class="ui times icon"></i> {{ __("Cancel") }}</a>
                </div>
                </form>
                
                </div>
            </div>
        </div>
    </div>

    @endsection
