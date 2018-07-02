<?php
include_once('bd.php');

class json
{
    private $db = '';

    function  __construct()
    {

        $this->db = DB::getObject();
        switch ($_GET['key']) {
            case 'login':
                $this->ifEquallyPassAndEmail($_GET['pass'],$_GET['email']);
                break;
            case 'all':
                $this->getAll();
                break;
            case 'allEng':
                $this->getEng();
                break;
        }
    }

    /**
     * @param $email
     * @return mixed
     */
    public  function  getPass($email){

        return $this->db->ifIsSetUser($email);
    }
    public function  ifEquallyPassAndEmail($pass, $email){
        $email=$this->clearString($email);
        $pass=md5($this->clearString($pass));
        if( ($this->getPass($email)===$pass)){
            echo json_encode('true');
        }else{
            echo json_encode('false');
        }
    }

    /**
     * @param $string
     * @return string
     */
    public function  clearString($string){
        return trim($string);

    }
    private function getAll(){
        $all=$this->db->selectAll();
        echo json_encode($all);
//        foreach($all as $value){
//            echo $value['name'];
//            echo $value['name_eng'];
//            echo $value['name_righter'];
//
//            echo'<br>';
//        }
    }
    private function getEng(){
        $all=$this->db->selectAll();
//        var_dump($all);
        foreach($all as $key=>$value){
            $all[$key]['name_righter']=$this->rusTranslit($value['name_righter']);
//            echo $value['name'];
//            echo $value['name_eng'];
//            echo $value['name_righter'];
//
//            echo'<br>';
        }
//        foreach ($all as $value){
//            var_dump($value);
//            echo '<br>';
//        }
        echo json_encode($all);
    }

    /**
     * @param $string
     * @return string
     */
private function rusTranslit($string) {
$converter = array(
'а' => 'a',   'б' => 'b',   'в' => 'v',
'г' => 'g',   'д' => 'd',   'е' => 'e',
'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
'и' => 'i',   'й' => 'y',   'к' => 'k',
'л' => 'l',   'м' => 'm',   'н' => 'n',
'о' => 'o',   'п' => 'p',   'р' => 'r',
'с' => 's',   'т' => 't',   'у' => 'u',
'ф' => 'f',   'х' => 'h',   'ц' => 'c',
'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

'А' => 'A',   'Б' => 'B',   'В' => 'V',
'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
'И' => 'I',   'Й' => 'Y',   'К' => 'K',
'Л' => 'L',   'М' => 'M',   'Н' => 'N',
'О' => 'O',   'П' => 'P',   'Р' => 'R',
'С' => 'S',   'Т' => 'T',   'У' => 'U',
'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
);
return strtr($string, $converter);
}


}


$f=new json();