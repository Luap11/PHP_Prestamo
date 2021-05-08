<?php
class DEmpleado{
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
        $pre = $con->getcon()->prepare("CALL SP_BUSDEL_EMPLEADO(?,?)");
        $pre->bindValue(1,$bus);
        $pre->bindValue(2,$tipo);
        $pre->execute();
        foreach($pre as $row){
            $this->array[]=array(
                'id'=>$row[0],
                'nom'=>$row[1],
                'ape'=>$row[2],
                'cargo'=>$row[3],
                'sueldo'=>$row[4],
                'codDist'=>$row[5],
            );
        }
    }
    public function insertEmpleado($nom,$ape,$cargo,$sueldo,$codDist){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("INSERT INTO EMPLEADO VALUES (NULL,?,?,?,?,?)");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$ape);
            $pre->bindValue(3,$cargo);
            $pre->bindValue(4,$sueldo);
            $pre->bindValue(5,$codDist);
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
    public function updateEmpleado($id,$nom,$ape,$cargo,$sueldo,$codDist){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("UPDATE EMPLEADO set NOM_EMP = ?, APE_EMP = ?, CARG_EMP = ?,SUE_EMP=?, COD_DIST = ? WHERE ID_EMP = ?");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$ape);
            $pre->bindValue(3,$cargo);
            $pre->bindValue(4,$sueldo);
            $pre->bindValue(5,$codDist);
            $pre->bindValue(6,$id);
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
    public function deleteEmpleado($id){
        try{
            $tipo= 'D';
            $con = new Conexion;
            $pre = $con->getcon()->prepare("CALL SP_BUSDEL_EMPLEADO(?,?)");
            $pre->bindValue(1,$id);
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
