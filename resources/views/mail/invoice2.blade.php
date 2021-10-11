<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	銀行振込
  <ul>
	  
  	
  	<li> 合計 : {{ $data['total'] }} </li>
  	<li> 支払い方法 : {{ $data['payment_type'] }} </li>
  	<li> コード : {{ $data['status_code'] }} </li>

  </ul>

  銀行ATMまたは、コンビニのATMよりお振込下さい。銀行窓口は確認までお時間が掛かりますので、ATMでのお振込をお願いします。

  振込先名【三井住友銀行】(ミツイスミトモ)
  支店名 【長野支店】(ナガノ)
  種別【普通】
  口座番号【3948290】
  振込み名義【ド)ディアレスト
  
  こちらが入金口座となります。 お振込人名にはID入力ではなく%nickname%様の【氏名】でお振込みをお願いいたします。
  
</body>
</html>