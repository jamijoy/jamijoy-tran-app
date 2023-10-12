<?php

namespace common;

require_once(__DIR__ . '/BaseBackend.php');

class Logger extends BaseBackend
{
    /**
     * @var array
     */
    public $queries = [];

    function prepareStatement($query)
    {
        $queries = $this->getQueries();
        $queries[] = $query;
        $this->setQueries($queries);
        return $this->getConnection()->prepare($query);
    }

    /**
     * @param $reference string
     * @param $note_type string 'Info', 'Warning', 'Error', 'System'
     * @param $message string
     * @param $username string
     * @return void
     */


    /**
     * @return string
     */
    public function getDatetime()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * @return array
     */
    public function getQueries()
    {
        return $this->queries;
    }

    /**
     * @param array $queries
     */
    public function setQueries($queries)
    {
        $this->queries = $queries;
    }
}