<input type="hidden" name="event_id" value="{{ $event->id }}" />
<div class="input-group _input_amount mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Rp</span>
  </div>
  {!! Form::text('amount', null, 
    [
      'class' => 'form-control',
      'placeholder' => '0'
    ]) 
  !!}
</div>

<div class="alert alert-primary text-center" role="alert">
  Donasi mulai dari Rp 1.000 dengan Dompet Kebaikan
</div>

<hr />
  <b>Cara Pembayaran</b>
  <ul>
    <li>Transfer Pembayaran via ATM</li>
    <li>Lakukan Transfer ke Nomer Rekening Berikut</li>
    <li>09131-122 BCA, atas nama Panji Tamzil</li>
  </ul>
<hr />

<p class="text-center">lengkapi data di bawah ini</p>

<div class="form-group">
  {!! Form::text('donatur_name', null, 
    [
      'class' => 'form-control',
      'placeholder' => 'Nama Anda'
    ]) 
  !!}
</div>

<div class="form-group">
  {!! Form::text('donatur_contact', null, 
    [
      'class' => 'form-control',
      'placeholder' => 'Kontak'
    ]) 
  !!}
</div>

<div class="form-group">
  {!! Form::textarea('donatur_message', null, 
    [
      'class' => 'form-control',
      'placeholder' => 'Tulis dukungan atau doa untuk penggalangan dana ini. Contoh: Semoga cepet sembuh, ya!',
      'rows' => 4
    ]) 
  !!}
</div>

<button type="submit" class="btn btn-danger btn-lg" style="width: 100%;">DONASI SEKARANG</button>