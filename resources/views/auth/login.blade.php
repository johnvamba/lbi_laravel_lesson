@extends('base')
@push('styles')
<style type="text/css">
	.form-center {
		width: fit-content;
		margin: auto;
	}
</style>
@endpush
@section('page_body')
<div class="form-center">
	<h1>Login</h1>
	<form action="" method="post">
		@csrf
		<input type="text" name="username">
		<br/>
		<input type="password" name="password">
		<br/>
		<button type="submit">Submit</button>
	</form>
</div>
@endsection