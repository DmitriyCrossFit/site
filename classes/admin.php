<?php

class admin extends ACore_admin {

      public function get_content () {

          $query = "SELECT id,title FROM data";
          $result = mysql_query($query);
          if(!$result) {
              exit(mysql_error());
          }
          echo '<div class="content">';
          echo "<div style='margin: 10px;'>";
          echo "<a style='color: #ac2925' href='?option=add_data'>Добавить новую статью<hr style='color: #444444'></a>";
          if ($_SESSION['res']){
              echo $_SESSION['res'];
              unset($_SESSION['res']);
          }
          $row = array();
          for($i=0; $i < mysql_num_rows($result); $i++){
              $row = mysql_fetch_array($result, MYSQL_ASSOC);
              printf("<p  style='font-size: 14px'>
              <a  style='color: #3c763d' href='?option=update_data&id_text=%s'>%s</a> |
              <a style='color: red' href='?option=delete_data&del=%s'>Удалить</a>
              </p>",$row['id'],$row['title'],$row['id']);

          }




        echo "</div>
             </div>";
    }
}

?>