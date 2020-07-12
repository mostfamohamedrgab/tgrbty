@component('mail::message')
# مرحبا

<p><strong>
  شكرا لمشاركتك تم قبول التجربه الخاصه بك
  <hr />
  {{$title}}
</strong></p>

@component('mail::button', ['url' => ''])
رؤية التجربة
@endcomponent

شكرا,<br>
{{ config('app.name') }}
@endcomponent
