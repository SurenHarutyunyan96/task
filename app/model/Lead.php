<?php

namespace App\Models;

class Lead extends Model
{

    protected string $table = 'leads';

    protected array $uniqFields = ['ip_address', 'user_agent', 'page_url'];

    public function create(array $data)
    {
        $data['views_count'] = 1;
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($columns) VALUES  ($values)";
        $stmt = DB->prepare($sql);
        $stmt->execute($data);
    }


    public function find($data)
    {
        $sql = "SELECT * FROM $this->table WHERE";

        $countUniq = count($this->uniqFields);
        $count = 0;
        foreach ($this->uniqFields as $uniqField){
            $value = $data[$uniqField];
            $sql .= " $uniqField = '$value'";

            $count++;

            if($count < $countUniq)
                $sql .= " AND";
        }
        $sql .= " LIMIT 1";
        $stmt= DB->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function update(int $id, array $data)
    {
        $sql = "UPDATE $this->table SET ";
        foreach ($data as $key=>$d){
           $sql .= "$key='$d', ";
        }
        $sql .= "views_count=views_count+1";

        $sql .= " WHERE id=$id";
        $stmt= DB->prepare($sql);
        $stmt->execute();

    }

    public function delete(int $id)
    {

    }
}