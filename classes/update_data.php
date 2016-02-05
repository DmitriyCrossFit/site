<?php
class update_data extends ACore_admin {

    protected function obr() {

        $id = $_POST['id'];
        $title = $_POST['title'];
        $discription= $_POST['m_desc'];
        $text= $_POST['r_desc'];

        if (empty($title) || empty($discription) || empty($text)) {
            exit ("Не заполнены обязательные поля");
        }

        $query =" UPDATE data SET title='$title', m_desc='$discription', r_desc='$text'
                   WHERE id='$id'";
        if(!mysql_query($query)){
            exit(mysql_error());
        }
        else {
            $_SESSION['res'] = "Изменения сохранены";
            header("Location:?option=admin");
            exit;

        }
    }

    public function get_content(){

        if($_GET['id_text']){
            $id_text=(int)$_GET['id_text'];
        }
        else {
            exit('Не правильные данные для этой станицы');
        }

        $text = $this->get_text_data($id_text);

        echo '<div class="content">';
        echo "<div style='margin: 10px;'>";
        if ($_SESSION['res']){
            echo $_SESSION['res'];
            unset($_SESSION['res']);
        }

        print <<<HEREDOC
<form enctype="multipart/form-data" action="" method="post">
    <p>Заголовок статьи:<br/>
    <input type="text" name="title" style="width: 414px" value='$text[title]'>
    <input type="hidden" name="id" style="width: 414px" value='$text[id]'>
    </p>
    <p>Краткое описание статьи:<br/>
        <textarea name="m_desc" cols="50" rows="5" >$text[m_desc]</textarea>
    </p>
    <p>Текст статьи:<br/>
        <textarea name="r_desc" cols="50" rows="7" >$text[r_desc]</textarea>
    </p>
    <p><input type="submit" name="button" value="Сохранить"></p>
</form>
HEREDOC;
        echo "</div>
             </div>";
    }
}
?>