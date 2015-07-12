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
         * mongodb://<db_user>:<db_password>@<host>:<port>/<database>
         */
        $connection_string = sprintf('mongodb://%s:%s@%s:%d/%s', DB::DBUSER, DB::DBPWD, DB::DBHOST, DB::DBPORT, DB::DBNAME);       
        try {
            $mongo = new MongoClient($connection_string);
            $this->database = $mongo->selectDB(DB::DBNAME);
        } catch (MongoConnectionException $e) {
            throw $e;
        }
    }

    /**
     * Self instance function for singleton pattern
     */
    public static function instantiate()
    {
        if(!self::$instance){
            self::$instance = new DB();
        }
        return self::$instance;
    }

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


