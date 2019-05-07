<div class="form-group">
  <label for="amount">Amount</label>
  {!! Form::text('amount', null, 
    [
      'class' => 'form-control',
      'placeholder' => '0'
    ]) 
  !!}
</div>

<div class="form-group">
  <label for="donatur_name">Nama Anda</label>
  {!! Form::text('donatur_name', null, 
    [
      'class' => 'form-control',
      'placeholder' => '0'
    ]) 
  !!}
</div>

<div class="form-group">
  <label for="donatur_contact">Kontak</label>
  {!! Form::text('donatur_contact', null, 
    [
      'class' => 'form-control',
      'placeholder' => '0'
    ]) 
  !!}
</div>

<div class="form-group">
  <label for="donatur_message">Pesan</label>
  {!! Form::textarea('donatur_message', null, 
    [
      'class' => 'form-control',
      'placeholder' => '0'
    ]) 
  !!}
</div>

<button type="submit" class="btn btn-danger btn-lg" style="width: 100%;">DONASI SEKARANG</button>