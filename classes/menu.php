<?php

class menu extends ACore {

    public function get_content()
    {
        echo '<div class="content">';

        if(!$_GET ['id_menu']){
            echo "Не правильные данные для вывода меню";
        }
        else{
            $id_menu = (int)$_GET ['id_menu'];
            if (!$id_menu){
                echo "Не правильные данные для вывода статьи";
            }
            else {
                $query = "SELECT id_menu,name_menu,text_menu FROM menu WHERE id_menu='$id_menu'";
                $result = mysql_query($query);
                if (!$result) {
                    exit(mysql_error());
                }
                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                printf(" <div style='margin: 10px;border-bottom: 2px solid #2C2C2C'>
                         <p style='font-size: 25px'>%s</p>
                         <p>%s</p>
                         </div>",$row['name_menu'],$row['text_menu']);

            }
        }




        echo '</div>
              <div class="clr"></div>';
    }

}
?>