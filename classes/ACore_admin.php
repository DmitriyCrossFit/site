<?php

abstract class ACore_admin {

    protected $db;

    public function __construct(){

        if(!$_SESSION['user']){
            header("Location:?option=login");
        }

        $this->db = mysql_connect(HOST,USER,PASSWORD);
        if(!$this->db){
            exit("Ошибка при подключении к базам данных".mysql_error);
        }
        if(!mysql_select_db(DB,$this->db)){
            exit("Нет такой базы данных".mysql_error);
        }
        mysql_query("SET NAMES 'UTF8'");
    }
    protected function get_header (){
        include "header.php";
    }
    protected  function get_menu (){

        echo '<div  class="sidebar">
              <div class="sidebar_nav">
                 <ul class="ul">';
        echo '<li class="li"><a href="?option=main">Админка</a> </li>';

        echo "<li class='li'><a href='?option=admin'>Редактирование</a></li>";
        echo "<li class='li'><a href='#'>Выход</a></li>";

        echo "</ul>
              </div>
              </div>";
    }


    public function get_body() {

        if($_POST || $_GET['del']) {
            $this->obr();
        }
        $this->get_header();
        $this->get_menu();
        $this->get_content();

    }
    protected function get_text_data($id){
        $query = "SELECT id,title,m_desc,r_desc FROM data WHERE id='$id' ";
        $result = mysql_query($query);
        if(!$result){
            exit(mysql_error4);
        }
        $row = array();
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        return $row;
    }

    abstract function get_content();

}

?>