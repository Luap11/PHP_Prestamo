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
                'dni'=>$row[3],
                'dist'=>$row[4]
            );
        }
    }
    public function insertCliente($nom,$ape,$dni,$codDist){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("INSERT INTO CLIENTE VALUES (NULL,?,?,?,?)");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$ape);
            $pre->bindValue(3,$dni);
            $pre->bindValue(4,$codDist);
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
    public function updateCliente($cod,$nom,$ape,$dni,$codDist){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("UPDATE cliente set NOM_CLI = ?, APE_CLI = ?, DNI_CLI = ?, COD_DIST = ? WHERE COD_CLI = ?");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$ape);
            $pre->bindValue(3,$dni);
            $pre->bindValue(4,$codDist);
            $pre->bindValue(5,$cod);
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
    public function deleteCliente($cod){
        try{
            $tipo= 'D';
            $con = new Conexion;
            $pre = $con->getcon()->prepare("CALL SP_BUSDEL_CLIENTE(?,?)");
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
