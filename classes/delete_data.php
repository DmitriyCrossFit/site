<?php
class delete_data extends ACore_admin {
    public function obr ()
    {
     if($_GET['del']){
         $id_text = (int)$_GET['del'];

         $query = "DELETE FROM data WHERE id='$id_text'";

         if(mysql_query($query)) {
             $_SESSION['res'] = "<br>Удалено";
             header("Location:?option=admin");
             exit();
         }
         else {
             exit("Ошибка удаления");
         }
     }
        else {
            exit("Не верные данные для этой страницы");
        }
    }

    public function get_content() {

    }
}

?>