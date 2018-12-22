<?php

$param=[
          "id"=>"3"

];
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://127.0.0.1/API/api.php?id=".$param['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "gzip",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
curl_close($curl);
$data=json_decode($response,true);
?>
<!DOCTYPE html>
<html>
<body>

  <table border="1" width="300">
    <thead>
      <tr>
      <td>STATUS</td>
      <td>MESSAGE</td>
      <td>ID</td>      
      <td>S1</td>
      <td>S2</td>
      <td>S3</td>
      <td>S4</td>
      <td>S5</td>
      <td>S6</td>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><?php echo $data['status'];?></td>
      <td><?php echo $data['message'];?></td>
      <td><?php echo $data['id'];?></td>      
      <td><?php echo $data['s1'];?></td>
      <td><?php echo $data['s2'];?></td>
      <td><?php echo $data['s3'];?></td>
      <td><?php echo $data['s4'];?></td>
      <td><?php echo $data['s5'];?></td>
      <td><?php echo $data['s6'];?></td>
      </tr>
    </tbody>

  </table>
    <code style="background-color:#f3f3f3;"><?php echo $response;?></code>

</body>
</html>