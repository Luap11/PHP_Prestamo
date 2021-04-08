<?php
class DCliente{
    private $array;
    public function getItem(){
        
    }
    public function getSize(){
        return count($this->array);
    }
    public function getArray(){
        return $this->array;
    }
    public function getList($bus){
        $tipo= 'B';
        $con = new Conexion;
        $pre = $con->getcon()->prepare("CALL SP_BUSDEL_CLIENTE(?,?)");
        $pre->bindValue(1,$bus);
        $pre->bindValue(2,$tipo);
        $pre->execute();
        foreach($pre as $row){
            $this->array[]=array(
                'cod'=>$row[0],
                'nom'=>$row[1],
                'ape'=>$row[2],
                'dni'=>$row[3]
            );
        }
    }
}