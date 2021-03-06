<?php

error_reporting(0);
// Multiple recipients
$from    = 'ibitswebsolutions@gmail.com';
$to  = $_POST['email'];
$bulletin_files = explode('x???x', $_POST['bulletin_files']);
$msds_files = explode('x???x', $_POST['msds_files']);
$name  = 'USA88 Lubes';
// Subject
$subject = $_POST['title'];

// Message
$message = '';
if($bulletin_files){
  $message .= '<tr><td>PRODUCT BULLETIN</td></tr>';
  foreach($bulletin_files as $item) {
    $message .= '<tr><td>'.$item.'</td></tr>';
  }
}
if($msds_files){
  $message .= '<tr><td>MSDS</td></tr>';
  foreach($msds_files as $item) {
    $message .= '<tr><td>'.$item.'</td></tr>';
  }
}

$body = '
 <h2>'.$subject.'</h2>
 <table>
 '.$message.'
 </table>
 <table>
  <tr>
    <br>
    <br>
    MAIN OFFICE:<br>
    Unit 109 Columbia Ortigas Ave., Mandaluyong City, Philippines 1550
    <br>
    <br>
    PLANT:<br>
    227 Gen. Ordonez St. Corner Balagtas St., Parang Marikina City, Philippines 1809
  </tr>
 </table>
';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: <'.$to.'>';
$headers[] = 'From:  '.$name.' <'.$from.'>';

// Mail it
if($to == '' ) {
    $response = [
        'message' => 'Please fill all neccessary field!',
        'status'  => 0
    ];
} else {
    if(mail($to, $subject, $body, implode("\r\n", $headers))) {
        $response = [
            'message' => 'Successfully Sent!',
            'status'  =>  1
        ];
    } else {
        $response = [
            'message' => 'An Error Occur!',
            'status'  => 0
        ];
    }
}
echo json_encode($response);
?>
