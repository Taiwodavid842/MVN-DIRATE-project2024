
<?php
  ob_start();
  header('Content-Type: application/json');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $to = 'taiwod842@gmail.com';
    $subject = 'Contact Form Submission';
    $message = "Name: $name\nPhone: $phone";

    if (mail($to, $subject, $message)) {
      $response = ['success' => true, 'message' => 'Email sent successfully!'];
    } else {
      $response = ['success' => false, 'message' => 'Error sending email!'];
    }

    echo json_encode($response);
  } else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method!']);
  }
?>



