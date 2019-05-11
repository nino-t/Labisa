<div class="form-group">
    <label for="old_password">Old Password</label>
    {!! Form::password('old_password', 
      [
        'class' => 'form-control'
      ]) 
    !!}
  </div>

  <div class="form-group">
    <label for="new_password">New Password</label>
    {!! Form::password('new_password', 
      [
        'class' => 'form-control'
      ]) 
    !!}
  </div>
  
  <div class="form-group">
    <label for="confirm_new_password">Confirm New Password</label>
    {!! Form::password('confirm_new_password', 
      [
        'class' => 'form-control'
      ]) 
    !!}
  </div>
  
  <button type="submit" class="btn btn-danger btn-lg" style="width: 100%;">Update Password</button>