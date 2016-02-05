<?php
  class add_data extends ACore_admin {

      protected function obr() {
           $title = $_POST['title'];
           $discription= $_POST['m_desc'];
           $text= $_POST['r_desc'];

          if (empty($title) || empty($discription) || empty($text)) {
              exit ("Не заполнены обязательные поля");
          }

          $query =" INSERT INTO data
                            (title,m_desc,r_desc)
                            VALUES ('$title','$discription','$text') ";
          if(!mysql_query($query)){
              exit(mysql_error());
          }
          else {
              $_SESSION['res'] = "Изменения сохранены";
              header("Location:?option=add_data");
              exit;

          }
      }

      public function get_content()
      {
          echo '<div class="content">';
          echo "<div style='margin: 10px;'>";
          if ($_SESSION['res']){
              echo $_SESSION['res'];
              unset($_SESSION['res']);
          }

print <<<HEREDOC
<form enctype="multipart/form-data" action="" method="post">
    <p>Заголовок статьи:<br/>
    <input type="text" name="title" style="width: 414px">
    </p>
    <p>Краткое описание статьи:<br/>
        <textarea name="m_desc" cols="50" rows="5"></textarea>
    </p>
    <p>Текст статьи:<br/>
        <textarea name="r_desc" cols="50" rows="7"></textarea>
    </p>
    <p><input type="submit" name="button" value="Сохранить"></p>
</form>
HEREDOC;
      echo "</div>
             </div>";
      }
  }
?>