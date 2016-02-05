<?php

class view extends ACore {

    public function get_content()
    {
        echo '<div class="content">';

        if(!$_GET ['id_text']){
            echo "Не правильные данные для вывода статьи";
        }
        else{
            $id_text = (int)$_GET ['id_text'];
            if (!$id_text){
                echo "Не правильные данные для вывода статьи";
            }
            else {
                $query = "SELECT title,m_desc,r_desc FROM data WHERE id='$id_text'";
                $result = mysql_query($query);
                if (!$result) {
                    exit(mysql_error());
                }
                $row = mysql_fetch_array($result, MYSQL_ASSOC);
                printf(" <div style='margin: 10px;border-bottom: 2px solid #2C2C2C'>
                         <p style='font-size: 25px'>%s</p>
                         <p>%s</p>
                         </div>",$row['title'],$row['r_desc']);
            }
        }




        echo '</div>
              <div class="clr"></div>';
    }

}
?>