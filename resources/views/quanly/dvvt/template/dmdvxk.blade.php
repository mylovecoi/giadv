<label class="form-control-label">Điểm xuất phát<span class="require">*</span></label>
{!!Form::text('diemdau', null, array('id' => 'diemdau','class' => 'form-control','required'=>'required'))!!}

<label class="form-control-label">Điểm cuối<span class="require">*</span></label>
{!!Form::text('diemcuoi', null, array('id' => 'diemcuoi','class' => 'form-control','required'=>'required'))!!}

<label class="form-control-label">Loại xe<span class="require">*</span></label>
{!!Form::text('loaixe', null, array('id' => 'loaixe','class' => 'form-control','required'=>'required'))!!}

@include('quanly.dvvt.template.dmdv')