<?php

namespace FA\Tests\Dao;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonDbTestCase
 *
 * @author jkendall
 */
class CommonDbTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Database connection
     * 
     * @var \PDO
     */
    protected $db;
    
    protected function setUp()
    {
        parent::setUp();
        $dsn = 'sqlite::memory:';
        $options = array(
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        );
        $this->db = new \PDO($dsn, null, null, $options);
        $this->db->exec(file_get_contents(APPLICATION_PATH . '/tests/_files/flaming_archer.sql'));
    }
    
    protected function tearDown()
    {
        $this->db = null;
        parent::tearDown();
    }
}
