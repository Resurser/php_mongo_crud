<?php

class DB {

    const DBHOST = 'ds029821.mongolab.com';
    const DBUSER = 'root';
    const DBPWD = 'root';
    const DBPORT = 29821;
    const DBNAME = 'userstory';
 
    private $database;
    private static $instance;

    private function __construct() {
        /**
         * Connection string form server
         * mongodb://<dbuser>:<dbpassword>@ds029821.mongolab.com:29821/userstory
         */
        $connection_string = sprintf('mongodb://%s:%s@%s:%d/%s', DB::DBUSER, DB::DBPWD, DB::DBHOST, DB::DBPORT, DB::DBNAME);       
        try {
            $mongo = new MongoClient($connection_string);
            $this->database = $mongo->selectDB(self::DBNAME);
//            $this->instance = new DB();
        } catch (MongoConnectionException $e) {
            throw $e;
        }
//        return $this->instance;
    }

    public static function instantiate()
    {
        if(!self::$instance){
            self::$instance = new DB();
        }
        return self::$instance;
    }
//     static public function instantiate()
//     {
//        if(!isset(self::$instance)){
//            $class = __CLASS__;
//            self::$instance = new $class;
//        }
//        return self::$instance;
//    }
//
//    public function get_collection($name)
//    {
//        return $this->databse->selectCollection($name);
//    }
    public function allDocument($collection)
    {
        $result = $this->database->$collection->find();
        return $result;
    }
    public function insertDocument($collection,$document)
    {
        $result = $this->database->$collection->insert($document,array('safe'=>true));
        return $result;
    }
    public function selectDocument($collection,$id)
    {
        $result = $this->database->$collection->findOne(array('_id' => $id));
        return $result;
    }
    public function updateDocument($collection,$id,$document)
    {
        $result = $this->database->$collection->update(array('_id' =>$id), $document, array('safe'=>TRUE));
        return $result;
    }
    public function updateMergeDocument($collection,$id,$new_document)
    {
        $result = $this->database->$collection->update(array('_id' => $id), array('$push' => array('comments' => $new_document)));
        return $result;
    }
    public function deleteDocument($collection,$id)
    {
        $result = $this->database->$collection->remove(array('_id' =>$id), array('safe'=>TRUE));
        return $result;
    }

    
}


