<?php

class Model_Main extends Model
{
    

    public function saveExchange($value, $from_currency, $to_currency, $final_amount){
        try{
            $sql = 'INSERT INTO history SET
            value = :value,
            from_currency = :from_currency,
            to_currency = :to_currency,
            final_amount = :final_amount
            ';
            $result= $this->db->prepare($sql);  
            $data = [
                'value' => $value,
                'from_currency' => $from_currency,
                'to_currency' => $to_currency,
                'final_amount' => $final_amount
            ];                   
            $result->execute($data);           
            
        }catch(Exception $e){
            echo 'Error adding data' . $e->getMessage();
        }

    }

    

    public function get_from_post($currency_name){
        try{            
            $sql = 'SELECT * from currency
            WHERE currency_name = :currency_name';
            $x = $this->db->prepare($sql);
            $x->bindValue('currency_name', $currency_name);
            $x->execute();
                      
        }catch(Exception $e){
            echo 'Failed to get data!' .  $e->getMessage();
            die();
        }
        return $currency = $x->fetch();  
        
    }

    public function change_visability($currency_name, $is_visible){
        try{            
            $sql = 'UPDATE currency
            SET is_visible = :is_visible
            WHERE currency_name = :currency_name
            ';
            $x = $this->db->prepare($sql);
            $x->bindValue('currency_name', $currency_name);
            $x->bindValue('is_visible', $is_visible);            
            $x->execute();
                      
        }catch(Exception $e){
            echo 'Error adding  data' . $e->getMessage();
            die();
        }
        
        
    }



    public function getHistory(){

        try{
            $sql = 'SELECT * from history';
            $result=$this->db->query($sql);
        }catch(Exception $e){
            echo 'Failed to get data!' .  $e->getMessage();
            die();
        }
        return $resultArray = $result->fetchAll();
    }

    

    

    public function getCurrencies(){
        try{
            $sql = 'SELECT * from currency';
            $result=$this->db->query($sql);
        }catch(Exception $e){
            echo 'Не удалось получить данные!';
            die();
        }
        return $resultArray = $result->fetchAll();
    }
}