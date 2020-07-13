@component('mail::message')
# رساله من {{$data['name']}}

<hr />
<p><strong>
  {{$data['msg']}}
</strong></p>
الايميل :
{{$data['email']}}
<hr />
شكرا,<br>
{{ config('app.name') }}
@endcomponent
