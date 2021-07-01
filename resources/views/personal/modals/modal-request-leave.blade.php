<!-- The Modal -->
<div class="modal fade" id="myModal_leave">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">


                <h3>{{ __('Request Leave') }}</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>


            <div class="modal-body">
                <form id="request_personal_leave_form" action="{{ url('personal/leaves/request') }}" class="ui form"
                    method="post" accept-charset="utf-8">
                    @csrf
                        <div class="form-group">
                            <label>{{ __('Leave Type') }}</label>
                            <select class=" form-control ui dropdown uppercase getid" name="type">
                                <option value="">Select Type</option>
                                @isset($lt)
                                    @foreach ($lt as $data)
                                      {{--   @foreach ($rights as $p)
                                            @if ($p == $data->id) --}}
                                                <option value="{{ $data->leavetype }},{{ $data->id }}" data-id="{{ $data->id }}">
                                                    {{ $data->leavetype }}</option>
                                          {{--   @endif
                                        @endforeach --}}
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="two form-groups">
                            <div class="form-group">
                                <label for="">{{ __('Leave from') }}</label>
                                <input id="leavefrom" type="date" placeholder="Start date" name="leavefrom"
                                    class="form-control uppercase" />
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Leave to') }}</label>
                                <input id="leaveto" type="date" placeholder="End date" name="leaveto"
                                    class="form-control uppercase" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('Return Date') }}</label>
                            <input id="returndate" type="date" placeholder="Enter Return date" name="returndate"
                                class="form-control uppercase" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Reason') }}</label>
                            <textarea class="uppercase" rows="5" name="reason" value="" class="form-control"></textarea>
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
   
                        <div class="actions">
                            <input type="hidden" name="typeid" value="">
                            <button class="btn btn-succes ui positive small button" type="submit" name="submit"><i
                                    class="ui   checkmark icon"></i> {{ __('Send Request') }}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ui times icon"></i>
                                {{ __('Cancel') }}</button>
                        </div>
                </form>


        </div>

        </div>
    </div>
</div>
