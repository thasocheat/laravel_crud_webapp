@foreach ($departments as $row)
<tr id="tr_object_id_{{ $row->id }}" class="bgc-h-orange-l4">
  <td>{{ $row->id }}</td>
  <td>{{ $row->name }}</td>
  <td>{{ $row->slug }}</td>
  <td><img width="48" src="{{ asset('uploads') . '/' . $row->image }}" alt="{{ $row->image }}"></td>
  <td>{{ date('d-M-Y',strtotime($row->created_at)) }}</td>
  <td>
    @include('admin.templates.crudAction')
  </td>
</tr>
@endforeach