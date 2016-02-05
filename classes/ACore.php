<?php

abstract class ACore {

    protected $db;
    public function __construct(){
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
        $row = $this->menu_array();
        echo '<div  class="sidebar">
              <div class="sidebar_nav">
                 <ul class="ul">';
        echo '<li class="li"><a href="?option=main">Главная</a> </li>';
        echo '<li class="li"><a href="?option=login">Авторизация</a> </li>';
        foreach($row as $item){
            printf("<li><a href='?option=menu&id_menu=%s'>%s</a> </li>"
            ,$item['id_menu'],$item['name_menu']);
        }
        echo "</ul>
              </div>
              </div>";
    }
    protected  function menu_array (){
        $query = "SELECT id_menu, name_menu FROM menu";

        $result = mysql_query($query);
        if(!$result) {
            exit(mysql_error());
        }
        $row = array();
        for($i=0; $i < mysql_num_rows($result);$i++){
            $row[] = mysql_fetch_array($result, MYSQL_ASSOC);
        }
        return $row;
    }

    public function get_body() {
        if($_POST) {
            $this->obr();
        }
        $this->get_header();
        $this->get_menu();
        $this->get_content();

    }
    abstract function get_content();
}

?>