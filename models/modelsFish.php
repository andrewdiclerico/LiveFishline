<?php

//*****************************************************
//
// This class provides a wrapper for the database 
// All methods work on the fish table

class AddFish
{
    // This data field represents the database
    private $addfishdata;
 
    // Maximum number of records to insert into database for testing
    const MAX_INSERT_ROWS = 1000;
    
    // INPUT: URL of database configuration file
    // Throws exception if database access fails
    // ** This constructor is very generic and can be used to 
    // ** access your course database for any assignment
    // ** The methods need to be changed to hit the correct table(s)
    public function __construct($configFile) 
    {
        // Parse config file, throw exception if it fails
        if ($ini = parse_ini_file($configFile))
        {
            // Create PHP Database Object
            $addfishPDO = new PDO( "mysql:host=" . $ini['servername'] . 
                                ";port=" . $ini['port'] . 
                                ";dbname=" . $ini['dbname'], 
                                $ini['username'], 
                                $ini['password']);

            // Don't emulate (pre-compile) prepare statements
            $addfishPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Throw exceptions if there is a database error
            $addfishPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Set our database to be the newly created PDO
            $this->addfishData = $addfishPDO;
        }
        else
        {
            // Things didn't go well, throw exception!
            throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
        }

    } // end constructor
    //*****************************************************
    // Load caught fish into database table "schools" from a CSV file
    // INPUT: Name of CSV file to load schools from
    //       Field order: fish species, weight, location, released, others Abbreviation
    // RETURNS: True if file opened and schools inserted into table
    //               False otherwise


    //This finction will get all the species
    public function getspecies () {
    
        $results = [];
        $addfishTable = $this->addfishData;

        $stmt = $addfishTable->prepare("SELECT * FROM addfish ORDER BY fishID DESC"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);       
        }
        return ($results);
    }
    //This function will get the record of one fish only
    public function getfish ($id) {
    
        $results = [];
        $addfishTable = $this->addfishData;

        $stmt = $addfishTable->prepare("SELECT * FROM addfish WHERE fishID = :fishID"); 
        $stmt->bindValue(':fishID', $id);

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);       
        }
        return($results);
    }
    public function addFish ($species, $fishlength, $fishweight, $locations, $released, $notes, $images) {
        
        $results = false;
        $addfishTable = $this->addfishData;

        //Connecting to the datatble
        $stmt = $addfishTable->prepare("INSERT INTO addfish SET species = :species, fishlength = :fishlength, fishweight = :fishweight, locations = :locations, released = :released, notes = :notes, images = :images");

        //array for each fields
        $binds = array(
            ":species" => $species,
            ":fishlength" => $fishlength,
            ":fishweight" => $fishweight,
            "locations" => $locations,
            ":released" => $released,
            ":notes" => $notes,
            ":images" => $images
        );
        
        $results = ($stmt->execute($binds) && $stmt->rowCount() > 0);
        // Returning back
        return ($results);
    }


        //This function will update a record
    public function updatefish($id, $species, $fishlength, $fishweight, $locations, $released, $notes, $images){

    
        $results = false;
        $addfishTable = $this->addfishData;

        //Connecting to the database
        $stmt = $addfishTable->prepare("UPDATE addfish SET species = :species, fishlength = :fishlength, fishweight = :fishweight, locations = :locations, released = :released, notes = :notes, images = :images WHERE fishID = :fishID");

        //arrays for each fields
        $binds = array(
            ":fishID" => $id,
            ":species" => $species,
            ":fishlength" => $fishlength,
            ":fishweight" => $fishweight,
            "locations" => $locations,
            ":released" => $released,
            ":notes" => $notes,
            ":images" => $images
        );
        
        //Execite stmt by using blinds and check and return
        $results = ($stmt->execute($binds) && $stmt->rowCount() > 0);
        //returnign back
        return ($results);
    }

    //This will delete the added fish by the id
    public function deletefish($id){

        $results = false;
        $addfishTable = $this->addfishData;
        
        //Conneting to the database
        $stmt = $addfishTable->prepare("DELETE FROM addfish WHERE fishID = :fishID");
        //Grabbing thte record id.
        $stmt->bindValue(':fishID', $id);
        //Executing the results
        $results = ($stmt->execute() && $stmt->rowCount() > 0);
        //returning back
        return ($results);
    }
    //database refe..
    public function getDatabaseRef(){
        return $this->addfishData;
    }
    //deconstruct
    //public function __deconstruct(){
        //$this->addfishData = null;
    
    //} 

} // end add fish class

class profile{

    // This data field represents the database
    private $profilesdata;
 
    // Maximum number of records to insert into database for testing
    const MAX_INSERT_ROWS = 1000;

    // INPUT: URL of database configuration file
    // Throws exception if database access fails
    public function __construct($configFile) 
    {
        // Parse config file, throw exception if it fails
        if ($ini = parse_ini_file($configFile))
        {
            // Create PHP Database Object
            $profilesPDO = new PDO( "mysql:host=" . $ini['servername'] . 
                                ";port=" . $ini['port'] . 
                                ";dbname=" . $ini['dbname'], 
                                $ini['username'], 
                                $ini['password']);

            // Don't emulate (pre-compile) prepare statements
            $profilesPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            // Throw exceptions if there is a database error
            $profilesPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Set our database to be the newly created PDO
            $this->profilesData = $profilesPDO;
        }
        else
        {
            // Things didn't go well, throw exception!
            throw new Exception( "<h2>Creation of database object failed!</h2>", 0, null );
        }

    } // end constructor

    //This function all the profiles
    public function getprofiles() {
    
        $results = [];
        $profilesTable = $this->profilesData;

        $stmt = $profilesTable->prepare("SELECT * FROM fishline.users ORDER BY create_date"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);       
        }
        return($results);
    }
    public function getprofile($username) {
    
        $results = [];
        $profilesTable = $this->profilesData;
        $stmt = $profilesTable->prepare("SELECT * FROM fishline.users WHERE username = :username"); 
        $stmt->bindValue(':username', $username);

        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);       
        }
        return($results);
    }
    public function addprofiles($new_name, $names, $state, $bio) {
        
        $results = false;
        $profilesTable = $this->profilesData;

        //Connecting to the datatble
        $stmt = $profilesTable->prepare("INSERT INTO fishline.users SET userphoto = :userphoto, names = :names, state = :state, bio = :bio");

        //array for each fields
        $binds = array(
            ":userphoto" => $new_name,
            ":names" => $names,
            ":state" => $state,
            ":bio" => $bio,
        );
        
        $results = ($stmt->execute($binds) && $stmt->rowCount() > 0);
        // Returning back
        return ($results);
    }
        //This function will update a record
        public function updateprofiles($username, $name, $state, $bio){

    
            $results = false;
            $profilesTable = $this->profilesData;
    
            //Connecting to the database
            $stmt = $profilesTable->prepare("UPDATE fishline.users SET name = :name, state = :state, bio = :bio WHERE username = :username");
    
            //arrays for each fields
            $binds = array(
                ":username" => $username,
                ":name" => $name,
                ":state" => $state,
                ":bio" => $bio,
            );
            
            //Execite stmt by using blinds and check and return
            $results = ($stmt->execute($binds) && $stmt->rowCount() > 0);
            //returnign back
            return ($results);
        }


} 

?>