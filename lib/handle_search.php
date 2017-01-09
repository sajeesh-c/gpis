<?php

class Gpis_Lib_Handle_Search extends Gpis_Lib_Db_Adapter
{

    protected $_searchForm;

    public function __construct($formObj)
    {

        $this->_searchForm = $formObj;
    }

    /**
     * insert search values into DB
     */
    public function insertSearchInfo()
    {

        if (count($this->_searchForm->getPost())) {
            $lat = $this->_searchForm->getLatitude();
            $lon = $this->_searchForm->getLongitudee();
            $keyWord = $this->_searchForm->getSearchKeyword();
            $count = 1;

            // prepare sql and bind parameters
            $stmt = $this->getConnection()->prepare("INSERT INTO search_location (latitude, longitude, search_words, search_count)
                                    VALUES (:latitude, :longitude, :search_words,  :search_count)
                                    ON DUPLICATE KEY UPDATE `search_count` = `search_count` + :search_count");
            $stmt->bindParam(':latitude', $lat);
            $stmt->bindParam(':longitude', $lon);
            $stmt->bindParam(':search_words', $keyWord);
            $stmt->bindParam(':search_count', $count);

            $stmt->execute();
        }

    }

    public function getUsersSearchInfo($limit = null)
    {

    }

}

$searchDbHandle = new Gpis_Lib_Handle_Search(($searchForm));

$searchDbHandle->insertSearchInfo();