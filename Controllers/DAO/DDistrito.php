<?php
class DDistrito{
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
        $pre = $con->getcon()->prepare("CALL SP_BUSDEL_DISTRITO(?,?)");
        $pre->bindValue(1,$bus);
        $pre->bindValue(2,$tipo);
        $pre->execute();
        foreach($pre as $row){
            $this->array[]=array(
                'cod'=>$row[0],
                'nom'=>$row[1]
            );
        }
    }
    public function insertDistrito($nom){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("INSERT INTO DISTRITO VALUES (NULL,?)");
            $pre->bindValue(1,$nom);
            $pre->execute();
            $this->array[]=array(
                'action'=> 'Insert',
                'success'=> true);
        }catch(PDOException $e){
            $this->array[]=array(
                'action'=> 'Insert',
                'success'=> false,
                'error'=> $e->getMessage()
            );
        }
    }
    public function updateDistrito($cod,$nom){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("UPDATE DISTRITO set NOM_DIST = ? WHERE COD_DIST = ?");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$cod);
            $pre->execute();
            $this->array[]=array(
                'action'=> 'Update',
                'success'=> true);
        }catch(PDOException $e){
            $this->array[]=array(
                'action'=> 'Update',
                'success'=> false,
                'error'=> $e->getMessage()
            );
        }
    }
    public function deleteDistrito($cod){
        try{
            $tipo= 'D';
            $con = new Conexion;
            $pre = $con->getcon()->prepare("CALL SP_BUSDEL_DISTRITO(?,?)");
            $pre->bindValue(1,$cod);
            $pre->bindValue(2,$tipo);
            $pre->execute();
            $this->array[]=array(
                'action'=>'Delete',
                'success'=>true,
            );
        }catch(PDOException $ex){
            $this->array[]=array(
                'action'=> 'Delete',
                'success'=> false,
                'error'=> $ex->getMessage()
            );
        }
    }
}
