{!! Form::open(array('url'=>"",'class'=>'form-horizontal add_form','id'=>'add_edit_form')) !!}
<div class="form-body">

    <div class="form-group">
        <label class="col-md-3 control-label">{{trans('core.fileno')}}: <span class="required">
                        * </span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="fileno" name="fileno" placeholder="{{trans('core.fileno')}}"
                   value="{{$nuData->fileno}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">{{trans('core.filename')}}: <span class="required">
                        * </span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="filename" name="filename" placeholder="{{trans('core.filename')}}"
                   value="{{$nuData->filename}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">{{trans('core.subject')}}: <span class="required">
                        * </span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="subject" name="subject" placeholder="{{trans('core.subject')}}"
                   value="{{$nuData->subject}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">{{ trans('core.filecomedate')}}: <span class="required">
                        * </span></label>

        <div class="col-md-8">
            <div class="input-group date date-picker"
                 data-date-format="dd/mm/yyyy" data-provide="datepicker"
                 data-date-viewmode="years">
                <input type="text" class="form-control" id="filecomedate" name="filecomedate" readonly
                       value="@if( null !==old('filecomedate') ){{ old('filecomedate')}} @else {{ date('d/m/Y') }}@endif">
                <span class="input-group-btn">
            <button class="btn default" type="button"><i class="fa fa-calendar"></i>
            </button>
        </span>
            </div>
        </div>
    </div>



    <div class="form-group">
        <label class="col-md-3 control-label">{{trans('core.filecomefrom')}}: <span class="required">
                        * </span>
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="filecomefrom" name="filecomefrom" placeholder="{{trans('core.filecomefrom')}}"
                   value="{{$nuData->filecomefrom}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">{{trans('core.filemark')}}</label>

        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-provide="datepicker"
                 data-date-viewmode="years">
                <input type="text" class="form-control" name="filemark"
                       value="{{ $nuData->filemark }}" placeholder="{{ trans('core.filemark') }}">
                <span class="input-group-btn">
                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
            </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label">{{trans('core.filego')}}:
        </label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="filego" name="filego" placeholder="{{trans('core.filego')}}"
                   value="{{$nuData->filego}}">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">{{trans('core.filegodate')}}</label>

        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-provide="datepicker"
                 data-date-viewmode="years">
                <input type="text" class="form-control" name="filegodate"  readonly=""
                       value="{{ $nuData->filegodate }}" placeholder="dd/mm/yyyy">
                <span class="input-group-btn">
                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
            </span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3">{{trans('core.filelawgodate')}}</label>

        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-provide="datepicker"
                 data-date-viewmode="years">
                <input type="text" class="form-control" name="filelawgodate" readonly="" 
                       value="{{ $nuData->filelawgodate }}" placeholder="dd/mm/yyyy">
                <span class="input-group-btn">
                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
            </span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">{{trans('core.filelawcomedate')}}</label>

        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-provide="datepicker"
                 data-date-viewmode="years">
                <input type="text" class="form-control" name="filelawcomedate" readonly="" 
                       value="{{ $nuData->filelawcomedate }}" placeholder="dd/mm/yyyy">
                <span class="input-group-btn">
                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
            </span>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label class="col-md-3 control-label">{{trans('core.comments')}}:</label>
        <div class="col-md-8">
            <textarea name="comments" placeholder="{{ trans('core.commentPlaceholder')}}" class="form-control" id="comments" cols="5" rows="2">{{$nuData->comments}}</textarea>
        </div>
    </div>

</div>

<div class="modal-footer">
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" id="submitbutton_add" onclick="addData();return false;"
                        class=" btn green"><i class="fa fa-edit"></i> {{trans('core.btnSubmit')}}</button>
                <button type="button" data-dismiss="modal"
                        class="btn dark btn-outline">{{trans('core.btnCancel')}}</button>
            </div>
        </div>
    </div>
</div>
{!!  Form::close()  !!}
