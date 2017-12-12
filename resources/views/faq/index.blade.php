@extends('faq.include.header')
@section('content')
	<div>
		<ul class="cd-faq-group">
			<li class="cd-faq-title"><h2><a href="faq/ask_question">Задать вопрос</a></h2></li>
			<li class="cd-faq-title"><h2><a href="authorization">Ответить на вопрос</a></h2></li>
		</ul>


	</div>
<section class="cd-faq">
	<!-- <a class="selected" href="#basics">Задать вопрос</a> -->
	<ul class="cd-faq-categories">
		<!-- <a class="selected" href="#basics">Задать вопрос</a> -->
		@foreach($categories as $categorie)
          <li><a href="#{{ $categorie->categorie }}">{{ $categorie->categorie }}</a></li>
		@endforeach
		<!-- <li><a class="selected" href="#basics">Basics</a></li>
		<li><a href="#mobile">Mobile</a></li>
		<li><a href="#account">Account</a></li>
		<li><a href="#payments">Payments</a></li>
		<li><a href="#privacy">Privacy</a></li>
		<li><a href="#delivery">Delivery</a></li> -->
	</ul> <!-- cd-faq-categories -->




	<div class="cd-faq-items">
@foreach($questionsAnswers as $questionAnswer)
<ul id="{{ $questionAnswer->categorie }}" class="cd-faq-group">
<li class="cd-faq-title"><h2>{{ $questionAnswer->categorie }}</h2></li>

	@foreach($categories as $categorie)
@if($questionAnswer->categorie === $categorie->categorie)

<li>

<a class="cd-faq-trigger" href="#0">{{ $questionAnswer->question }}</a>
<div class="cd-faq-content">
<p>{!! $questionAnswer->answer !!}</p>
</div> <!-- cd-faq-content -->
</li>
@endif

@endforeach
</ul>
@endforeach

	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="{{ asset('faq_style/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('faq_style/js/jquery.mobile.custom.min.js') }}"></script>
<script src="{{ asset('faq_style/js/main.js') }}"></script> <!-- Resource jQuery -->
</body>
</html>
@endsection
