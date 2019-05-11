<div class="form-group">
    <label for="name">Name</label>
    {!! Form::text('name', null, 
      [
        'class' => 'form-control',
        'placeholder' => '0'
      ]) 
    !!}
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    {!! Form::text('email', null, 
      [
        'class' => 'form-control',
        'placeholder' => 'Email'
      ]) 
    !!}
  </div>
  
  <div class="form-group">
    <label for="phone">Phone Number</label>
    {!! Form::number('phone', null, 
      [
        'class' => 'form-control',
        'placeholder' => '0'
      ]) 
    !!}
  </div>
  
  <div class="form-group">
    <label for="address">Address</label>
    {!! Form::textarea('address', null, 
      [
        'class' => 'form-control',
        'placeholder' => 'Address'
      ]) 
    !!}
  </div>
  
  <button type="submit" class="btn btn-danger btn-lg" style="width: 100%;">Update Profile</button>