<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
            <label class="title-input">Category</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-th-list"></i>
                </span>
                @php
                    $categories = App\Category::all()->pluck('name', 'id');
                    $categories[''] = '--Category--';
                @endphp
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>    

            @if ($errors->has('category'))
                <span class="help-block">
                    <strong>{{ $errors->first('category') }}</strong>
                </span>
            @endif                                                                
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group{{ $errors->has('purpose_category') ? ' has-error' : '' }}">
                <label class="title-input">Purpose Category</label> 
                <div class="input-group">
                    <span class="input-group-addon grup-white">
                        <i class="fa fa-th-list"></i>
                    </span>
                    @php
                        $categories = App\PurposeCategory::all()->pluck('name', 'id');
                        $categories[''] = '--Purpose Category--';
                    @endphp
                    {!! Form::select('purpose_category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>    
    
                @if ($errors->has('purpose_category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('purpose_category') }}</strong>
                    </span>
                @endif                                                                
            </div>
        </div>  
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="title-input">Name</label>
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-bus"></i>
                </span>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama event', 'required' => 'required', 'id' => 'name']) !!}
            </div>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif            
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            <label class="title-input">Slug</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'required' => 'required', 'id' => 'slug']) !!}
            </div>    

            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif                        
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="title-input">Description</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'description', 'required' => 'required', 'id' => 'description']) !!}
            </div>    

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif                        
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label class="title-input">Message</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::text('message', null, ['class' => 'form-control', 'placeholder' => 'message', 'required' => 'required', 'id' => 'message']) !!}
            </div>    

            @if ($errors->has('message'))
                <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif                        
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
            <label class="title-input">Contact</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::number('contact', null, ['class' => 'form-control', 'placeholder' => 'contact', 'required' => 'required', 'id' => 'contact']) !!}
            </div>    

            @if ($errors->has('contact'))
                <span class="help-block">
                    <strong>{{ $errors->first('contact') }}</strong>
                </span>
            @endif                        
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('target_amount') ? ' has-error' : '' }}">
            <label class="title-input">Target Amount</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::number('target_amount', null, ['class' => 'form-control', 'placeholder' => 'target_amount', 'required' => 'required', 'id' => 'target_amount']) !!}
            </div>    

            @if ($errors->has('target_amount'))
                <span class="help-block">
                    <strong>{{ $errors->first('target_amount') }}</strong>
                </span>
            @endif                        
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('expired_date') ? ' has-error' : '' }}">
            <label class="title-input">Expired Date</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::date('expired_date', null, ['class' => 'form-control', 'placeholder' => 'expired_date', 'required' => 'required', 'id' => 'expired_date']) !!}
            </div>    

            @if ($errors->has('expired_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('expired_date') }}</strong>
                </span>
            @endif                        
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group{{ $errors->has('thumbnail_url') ? ' has-error' : '' }}">
            <label class="title-input">Thumbnail URL</label> 
            <div class="input-group">
                <span class="input-group-addon grup-white">
                    <i class="fa fa-list-alt"></i>
                </span>
                {!! Form::file('thumbnail', ['class' => 'form-control', 'placeholder' => 'thumbnail_url', 'required' => 'required', 'id' => 'thumbnail_url']) !!}
            </div>    

            @if ($errors->has('thumbnail'))
                <span class="help-block">
                    <strong>{{ $errors->first('thumbnail') }}</strong>
                </span>
            @endif                        
        </div>
    </div>            
</div>

<hr>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <button type="submit" class="btn btn-primary btn-sm pull-right col-md-2 col-sm-4 col-xs-12">Simpan</button>
     </div> 
</div>
