<div class="form-group">
  @php
    $categories = App\Category::all()->pluck('name', 'id');
    $categories[''] = '--Kategori--';
  @endphp
  <label>Kategori</label>
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
  @php
    $categories = App\PurposeCategory::all()->pluck('name', 'id');
    $categories[''] = '--Purpose Category--';
  @endphp
  <label>Tujuan</label>
  {!! Form::select('purpose_category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
  <label>Nama Campaign</label>
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama event', 'required' => 'required', 'id' => 'name']) !!}
</div>

<div class="form-group">
  <label>Slug</label>
  {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug', 'required' => 'required', 'id' => 'slug']) !!}
</div>

<div class="form-group">
  <label>Deskripsi</label>
  {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Deskripsi', 'required' => 'required', 'id' => 'description']) !!}
</div>

<div class="form-group">
  <label>Pesan singkat</label>
  {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'message', 'required' => 'required', 'id' => 'message']) !!}
</div>

<div class="form-group">
  <label>Kontak yang dapat dihubungi</label>
  {!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'contact', 'required' => 'required', 'id' => 'contact']) !!}
</div>

<div class="form-group">
  <label>Target Pengumpulan</label>
  {!! Form::number('target_amount', null, ['class' => 'form-control', 'placeholder' => 'target_amount', 'required' => 'required', 'id' => 'target_amount']) !!}
</div>

<div class="form-group">
  <label>Batas Pengumpulan</label>
  {!! Form::date('expired_date', null, ['class' => 'form-control', 'placeholder' => 'expired_date', 'required' => 'required', 'id' => 'expired_date']) !!}
</div>

<div class="form-group">
  <label>Thumbnail</label>
  {!! Form::file('thumbnail', ['class' => 'form-control', 'placeholder' => 'thumbnail_url', 'required' => 'required', 'id' => 'thumbnail_url']) !!}
</div>  

<button type="submit" class="btn btn-danger btn-lg" style="width: 100%;">Simpan Campaign</button>