<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getusers() {
            $this->db->query("SELECT * FROM users");

            $result= $this->db->resultSet();

            return $result;
        }
    }