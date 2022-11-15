<?php

include_once __DIR__ . '/modelsFish.php';

class FishSearch extends AddFish{

    function Searchfish($species, $fishweight, $locations){

        $results = [];
        $binds = [];
        
        //database referent
        $addfishTable = $this->getDatabaseRef();   

        $sqlQuery =  "SELECT * FROM  addfish";
        $isFirstClause = true;

        //This is searching the car's brand
        if($species != ""){

            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  species LIKE :species";
            $binds['species'] = '%'.$species.'%';
        }

        //This will serch for the car's models.
        if ($fishweight != "") {

            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  fishweight LIKE :fishweight";
            $binds['fishweight'] = '%'.$fishweight.'%';
        }

        if ($locations != "") {

            if ($isFirstClause)
            {
                $sqlQuery .=  " WHERE ";
                $isFirstClause = false;
            }
            else
            {
                $sqlQuery .= " AND ";
            }
            $sqlQuery .= "  locations LIKE :locations";
            $binds['locations'] = '%'.$locations.'%';
        }

        
   
       // Create query object
        $stmt = $addfishTable->prepare($sqlQuery);

        //Executing the rows
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //returning back
        return $results;

    }
};

// class ProfileSearch extends AddProfile{

//     function Searchprofile($profile, $id){

//         $results = [];
//         $binds = [];
        
//         //database referent
//         $addfishTable = $this->getDatabaseRef();   

//         $sqlQuery =  "SELECT * FROM  users";
//         $isFirstClause = true;

//         //This is searching the car's brand
//         if($id != ""){

//             if ($isFirstClause)
//             {
//                 $sqlQuery .=  " WHERE ";
//                 $isFirstClause = false;
//             }
//             else
//             {
//                 $sqlQuery .= " AND ";
//             }
//             $sqlQuery .= "  id LIKE :id";
//             $binds['id'] = '%'.$id.'%';
//         }

//         //This will serch for the car's models.
//         if ($name != "") {

//             if ($isFirstClause)
//             {
//                 $sqlQuery .=  " WHERE ";
//                 $isFirstClause = false;
//             }
//             else
//             {
//                 $sqlQuery .= " AND ";
//             }
//             $sqlQuery .= "  name LIKE :name";
//             $binds['name'] = '%'.$name.'%';
//         }
   
//        // Create query object
//         $stmt = $addfishTable->prepare($sqlQuery);

//         //Executing the rows
//         if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
//         {
//             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         }
//         //returning back
//         return $results;

//     }
// };



?>