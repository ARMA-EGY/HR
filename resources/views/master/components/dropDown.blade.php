

<i class="bx bx-link-external text-primary pointer external-link" data-link="{{$data_link}}" data-select="#{{$input_name}}"></i>
<select class="form-control form-control-sm select2" name="{{$input_name}}" id="{{$input_name}}">
    <option value="">Select</option>
    @foreach($items as $item)
        <option value="{{$item->id}}" @if($id == $item->id) selected @endif>{{$item->name}}</option>
    @endforeach
</select>

<script>
$(document).ready(function() 
{
    $('.select2').select2();
});
</script>