<?php

class main extends ACore{

    public function get_content()
    {
        $query = "SELECT id,title,m_desc FROM data ORDER BY id DESC ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }

       echo '<div class="content">';
        $row = array();
        for($i=0; $i < mysql_num_rows($result); $i++){
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            printf("<div style='margin: 10px;border-bottom: 2px solid #2C2C2C'>
            <p style='font-size: 18px'>%s</p>
            <p>%s</p>
            <p style='color: #2a6496'><a href='?option=view&id_text=%s'>читать подробнее...</a></p>
</div>",$row['title'],$row['m_desc'],$row['id']);

        }
       echo '</div>
              <div class="clr"></div>';
    }

}
?>