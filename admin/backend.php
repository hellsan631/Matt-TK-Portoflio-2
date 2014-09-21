<?php

if(!session_id()) {
	@session_start();
} else {

}

class Config{
	static $confArray;

	public static function read($name){
		return self::$confArray[$name];
	}

	public static function write($name, $value){
		self::$confArray[$name] = $value;
	}

}

class InvalidArrayKey extends LogicException {}

abstract class DatabaseObject{

    protected $dataArray = array();
    protected $className;

    //Force Extending class to define this method
    abstract protected function classDataSetup();

    public function refresh(){
        $this->classDataSetup();
    }

    // Common method
    public function saveNew(){

        $keyChain = $this->getKeyChain();

        if($keyChain === false){
            throw new InvalidArrayKey("The Array Key doesn't exist within the implemented object.");
        }

        $prepareStatement = "INSERT INTO {$this->className} (";

        foreach($keyChain as $val){
            if($val == "id"){

            }else{
                $prepareStatement .= "$val, ";
            }
        }

        $prepareStatement = rtrim($prepareStatement, ", ");
        $prepareStatement .= ") VALUES (";

        foreach($keyChain as $val){
            if($val == "id"){

            }else{
                $prepareStatement .= ":$val, ";
            }
        }

        $prepareStatement = rtrim($prepareStatement, ", ");
        $prepareStatement .= ")";

        $executeArray = array();

        foreach ($keyChain as $val) {
            if($val == "id"){

            }else{
                $executeArray[':'.$val] = $this->dataArray[$val];
            }
        }

        trigger_error($prepareStatement. " <br/> ".$executeArray);

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare($prepareStatement);

            $query->execute($executeArray);

            if($query->rowCount() > 0){
                $this->setValue('id', $pdo->dbh->lastInsertId());
                return true;
            }

            return false;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;

    }

    public function saveOld(){

        $keyChain = $this->getKeyChain();

        if($keyChain === false){
            throw new InvalidArrayKey("The Array Key doesn't exist within the implemented object.");
        }

        $prepareStatement = "UPDATE {$this->className} SET ";

        foreach($keyChain as $val){
            if($val == "id"){

            }else{
                $prepareStatement .= "$val = :$val, ";
            }
        }

        $prepareStatement = rtrim($prepareStatement, ", ");
        $prepareStatement .= " WHERE id = :id";

        $executeArray = array();

        foreach ($keyChain as $val) {
            $executeArray[':'.$val] = $this->dataArray[$val];
        }

        //trigger_error($prepareStatement);

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare($prepareStatement);

            $query->execute($executeArray);

            if($query->rowCount() > 0){
                return true;
            }

            return false;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;

    }

    public function erase(){

        $prepareStatement = "DELETE FROM {$this->className} WHERE id = :id";
        $executeArray = array(':id' => $this->getValue('id'));

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare($prepareStatement);

            $query->execute($executeArray);

            if($query->rowCount() > 0){

                if($this->className == "Project"){

                    $query = $pdo->dbh->prepare("DELETE FROM tasks WHERE project_id = :id");

                    $query->execute($executeArray);

                    $query = $pdo->dbh->prepare("DELETE FROM previews WHERE project_id = :id");

                    $query->execute($executeArray);

                    $query = $pdo->dbh->prepare("DELETE FROM snaps WHERE project_id = :id");

                    $query->execute($executeArray);

                }

                return true;
            }

            return false;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;

    }

    public function loadInstance($id){

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare("SELECT * FROM {$this->className} WHERE id = :id");

            $query->execute(array(':id' => $id));

            $newInstance = $query->fetchObject($this->className);

            if(is_object($newInstance)){
                $newInstance->refresh();
            }

            return $newInstance;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;

    }

    public function getNextInstance($last_id){

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare("SELECT * FROM {$this->className} WHERE id = (SELECT MIN(id) FROM {$this->className} WHERE id > :last_id)");

            $query->execute(array(':last_id' => $last_id));

            $newInstance = $query->fetchObject($this->className);

            if(is_object($newInstance)){
                $newInstance->refresh();
            }

            return $newInstance;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;

    }

    public function getValue($name){

        if(array_key_exists($name, $this->dataArray)){
            return $this->dataArray[$name];
        }else{
            throw new InvalidArrayKey("The Array Key doesn't exist within the implemented object.");
        }

    }

    public function setValue($name, $value){
        if(array_key_exists($name, $this->dataArray)){
            $this->dataArray[$name] = $value;
        }else{
            throw new InvalidArrayKey("The Array Key doesn't exist within the implemented object.");
        }

    }

    private function getKeyChain(){

        if($this->className == "project"){
            return array('id', 'date_range', 'role', 'client', 'title', 'link', 'tags', 'stub', 'header_img');
        }else if($this->className == "task"){
            return array('id', 'project_id', 'title', 'des', 'image');
        }else if($this->className == "snapshot"){
            return array('id', 'project_id', 'preview_img', 'full_img');
        }else if($this->className == "preview"){
            return array('id', 'project_id', 'image', 'title');
        }

        return false;

    }

    public function getList($sorting = null){

        if($sorting == null){
            $prepareStatement = "SELECT * FROM {$this->className}";
        }else if($sorting == "project_id"){
            $prepareStatement = "SELECT * FROM {$this->className} GROUP BY id, project_id ORDER BY IF(project_id, project_id, id), project_id, id";
        }else if($sorting == "title"){
            $prepareStatement = "SELECT * FROM {$this->className} ORDER BY title";
        }else if($sorting == "id"){
            $prepareStatement = "SELECT * FROM {$this->className} ORDER BY id ASC";
        }else if($sorting == "date"){
            $prepareStatement = "SELECT * FROM {$this->className} ORDER BY id DESC";
        }

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare($prepareStatement);

            $query->execute();

            $objects = $query->fetchAll(PDO::FETCH_CLASS, $this->className);

            if($objects === false){
                return false;
            }

            foreach($objects as $key => $object){

                if(is_object($object)){
                    $object->refresh();
                }

                $objects[$key] = $object;
            }

            return $objects;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;
    }

}

class project extends DatabaseObject{

    public $id;
    public $date_range;
    public $role;
    public $client;
    public $title;
    public $link;
    public $tags;
    public $header_img;
    public $stub;

    public function __construct(){
        $this->classDataSetup();
    }

    protected function classDataSetup(){
        $this->dataArray = array('id' => $this->id, 'date_range' => $this->date_range,
            'role' => $this->role, 'client' => $this->client, 'title' => $this->title,
            'link' => $this->link, 'tags' => $this->tags, 'stub' => $this->stub,
            'header_img' => $this->header_img);
        $this->className = 'project';
    }

    public function getRelated($className){

        try {

            $pdo = Core::getInstance();
            $query = $pdo->dbh->prepare("SELECT * FROM {$className} WHERE project_id = :id ORDER BY id ASC");

            $query->execute(array(':id' => $this->getValue('id')));

            $objects = $query->fetchAll(PDO::FETCH_CLASS, $className);

            foreach($objects as $key => $object){
                $object->refresh();
                $objects[$key] = $object;
            }

            return $objects;

        }catch(PDOException $pe) {

            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);

        }

        return false;

    }

}

class task extends DatabaseObject{

    public $id;
    public $project_id;
    public $title;
    public $des;
    public $image;

    public function __construct(){
        $this->classDataSetup();
    }

    protected function classDataSetup(){
        $this->dataArray = array('id' => $this->id, 'project_id' => $this->project_id,
            'title' => $this->title, 'des' => $this->des, 'image' => $this->image);
        $this->className = 'task';
    }

}

class snapshot extends DatabaseObject{

    public $id;
    public $project_id;
    public $preview_img;
    public $full_img;

    public function __construct(){
        $this->classDataSetup();
    }

    protected function classDataSetup(){
        $this->dataArray = array('id' => $this->id, 'project_id' => $this->project_id,
            'preview_img' => $this->preview_img, 'full_img' => $this->full_img);
        $this->className = 'snapshot';
    }

}

class preview extends DatabaseObject{

    public $id;
    public $project_id;
    public $image;
    public $title;

    public function __construct(){
        $this->classDataSetup();
    }

    protected function classDataSetup(){
        $this->dataArray = array('id' => $this->id, 'project_id' => $this->project_id,
            'image' => $this->image, 'title' => $this->title);
        $this->className = 'preview';
    }

}

class Core{

	public $dbh;
	private static $instance;

	public function __construct(){

		$dsn = 'mysql:host=' . Config::read('db.host') .
			';dbname='    . Config::read('db.base') .
			';connect_timeout=15';

		$this->dbh = new PDO($dsn, Config::read('db.user'), Config::read('db.password'), array(PDO::ATTR_PERSISTENT => true));
		$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
	}

	public static function getInstance(){
		if (!isset(self::$instance)){
			$object = __CLASS__;
			self::$instance = new $object;
		}

		return self::$instance;
	}

}

?>