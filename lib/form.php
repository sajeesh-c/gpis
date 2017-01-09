<?php

class Gpis_Lib_Search_Form
{
    /**
     * @return string
     */
    public function getFormAction()
    {
        return './placeinfo.php';
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $_POST;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {

        return isset($_POST['latitude']) ? $_POST['latitude'] : '';
    }

    /**
     * @return string
     */
    public function getLongitudee()
    {
        return isset($_POST['longitude']) ? $_POST['longitude'] : '';
    }

    /**
     * @return string
     */
    public function getSearchKeyword()
    {
        return isset($_POST['search_words']) ? $_POST['search_words'] : '';
    }
}

$searchForm = new Gpis_Lib_Search_Form();