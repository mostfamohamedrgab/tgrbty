@if($errors->any())
  @foreach($errors->all() as $e)
  <script>
  $.toast({
      text : "{{$e}}",
      allowToastClose:true,
      hideAfter: 10000,
      position:'top-right',
      bgColor:'#ff0000'
  })
  </script>
  @endforeach
@endif

@if( session()->has('success') )
  <script>
  $.toast({
      text : "{{ session()->get('success') }}",
      allowToastClose:true,
      hideAfter: 10000,
      position:'top-right',
      bgColor:'#D4EDDA'
  })
  </script>
@endif

@if( session()->has('msg') )
  <script>
  $.toast({
      text : "{{ session()->get('msg') }}",
      allowToastClose:true,
      hideAfter: 10000,
      position:'top-right',
      bgColor:'#D1ECF1'
  })
  </script>
@endif
