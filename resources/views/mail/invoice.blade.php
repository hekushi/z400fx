<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  
  <ul>
  	<li> 注文ID: {{ $data['payment_id'] }}  </li>
  	<li> 合計 : {{ $data['total'] }} </li>
  	<li> 支払い方法 : {{ $data['payment_type'] }} </li>
  	<li> コード : {{ $data['status_code'] }} </li>

  </ul>


</body>
</html>