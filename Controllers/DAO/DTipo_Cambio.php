<?php
class DTipoCambio{
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
        $pre = $con->getcon()->prepare("CALL SP_BUSDEL_TIPO_CAMBIO(?,?)");
        $pre->bindValue(1,$bus);
        $pre->bindValue(2,$tipo);
        $pre->execute();
        foreach($pre as $row){
            $this->array[]=array(
                'cod'=>$row[0],
                'nom'=>$row[1],
                'monto'=>$row[2],
            );
        }
    }
    public function insertTipoCambio($nom,$monto){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("INSERT INTO TIPO_CAMBIO VALUES (NULL,?,?)");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$monto);
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
    public function updateTipoCambio($cod,$nom,$monto){
        try{
            $con = new Conexion;
            $pre = $con->getcon()->prepare("UPDATE TIPO_CAMBIO set NOM_TIP = ?, MONTO_TIP = ? WHERE COD_TIP = ?");
            $pre->bindValue(1,$nom);
            $pre->bindValue(2,$monto);
            $pre->bindValue(3,$cod);
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
    public function deleteTipoCambio($cod){
        try{
            $tipo= 'D';
            $con = new Conexion;
            $pre = $con->getcon()->prepare("CALL SP_BUSDEL_TIPO_CAMBIO(?,?)");
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
