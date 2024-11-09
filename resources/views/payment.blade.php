<html>
<title>{{ config('app.name', 'Laravel') }}</title>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body
{
	background: #f5f5f5;
}	
.inner
{
	position:absolute;
	top:40%;
	left:0;
	right:0;
	text-align:center;
	font-size:30px;
}
</style>
<body onLoad="document.process.submit()">
<div class="inner"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>
{!! $form !!}
</body>
</html>