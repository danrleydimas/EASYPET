<?php

function upload_image()
{
 if(isset($_FILES["inputFoto"]))
 {
  $extension = explode('.', $_FILES['inputFoto']['name']);
  $new_name = rand() . '.' . $extension[1];
  $destination = './profile/' . $new_name;
  move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
  return $new_name;
 }
}

function get_image_name($user_id)
{
 include('conexao.php');
 $statement = $connection->prepare("SELECT foto FROM funcionario WHERE id = '$user_id'");
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image"];
 }
}

function get_total_all_records()
{
 include('conexao.php');
 $statement = $connection->prepare("SELECT * FROM users");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

?>