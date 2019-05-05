<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group{{ $errors->has('donatur_name') ? ' has-error' : '' }}">
                <label class="title-input">Donatur Name</label>
                <div class="input-group">
                    <span class="input-group-addon grup-white">
                        <i class="fa fa-bus"></i>
                    </span>
                    {!! Form::text('donatur_name', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama donatur', 'required' => 'required', 'id' => 'donatur_name']) !!}
                </div>          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group{{ $errors->has('donatur_contact') ? ' has-error' : '' }}">
                <label class="title-input">Donatur Contact</label> 
                <div class="input-group">
                    <span class="input-group-addon grup-white">
                        <i class="fa fa-list-alt"></i>
                    </span>
                    {!! Form::number('donatur_contact', null, ['class' => 'form-control', 'placeholder' => 'donatur_contact', 'required' => 'required', 'id' => 'donatur_contact']) !!}
                </div>    
    
                @if ($errors->has('donatur_contact'))
                    <span class="help-block">
                        <strong>{{ $errors->first('donatur_contact') }}</strong>
                    </span>
                @endif                        
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group{{ $errors->has('donatur_message') ? ' has-error' : '' }}">
                <label class="title-input">Message</label> 
                <div class="input-group">
                    <span class="input-group-addon grup-white">
                        <i class="fa fa-list-alt"></i>
                    </span>
                    {!! Form::text('donatur_message', null, ['class' => 'form-control', 'placeholder' => 'donatur_message', 'required' => 'required', 'id' => 'donatur_message']) !!}
                </div>    
    
                @if ($errors->has('donatur_message'))
                    <span class="help-block">
                        <strong>{{ $errors->first('donatur_message') }}</strong>
                    </span>
                @endif                        
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                <label class="title-input">Amount</label> 
                <div class="input-group">
                    <span class="input-group-addon grup-white">
                        <i class="fa fa-list-alt"></i>
                    </span>
                    {!! Form::number('amount', null, ['class' => 'form-control', 'placeholder' => 'amount', 'required' => 'required', 'id' => 'amount']) !!}
                </div>    
    
                @if ($errors->has('amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('amount') }}</strong>
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
    