<?php
////////////////////////////////////////////////////////////////////////////////
//
// Copyright (c) 2017 wilson.souza
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.
//
////////////////////////////////////////////////////////////////////////////////
namespace testapiserver;
use mysqli;

class Controller
{
    protected $m_sql_handle = null;
    
    public function __construct()
    {
        $this->m_sql_handle = new mysqli("localhost", "admin", "was260963#", "dbuser");
    }
    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     *
     * @url GET /
     */
    public function test()
    {
        return "Server started!";
    }
    
    /**
     * Logs in a user with the given name, email, phone and date birth POSTed. Though true
     * REST does not believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /user
     */
    public function login()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $birth = $_POST["date_birth"];
        
        $result = $this->m_sql_handle->select("SELECT name FROM user WHERE name = " + $name);
        
        if($result->num_roews > 0)
        {
            return array("Error" => "User already exists " . $name);
        }
        
        $this->m_sql_handle->insert("INSERT INTO user(name, email, phone, birth) VALUES("+$name+","+$email+","+$phone+","+$birth+")");
        return array("success" => "User " . $name .  " added.");
    }
    
    /**
     * Gets the user by email
     *
     * @url GET /user/$email
     */
    public function getUser($email = null)
    {
        $result = $this->m_sql_handle->select("SELECT email FROM user WHERE email = " + $email);
        
        if($result->num_rows > 0)
        {
           $rows = $result->fetch_assoc();
          return array("name"=>$row["name"], "email"=>$row["email"], "phone"=>$row["phone"], "birth"=>$row["birth"]);
        }
        
        return array("Error"=> "email not found!", "email" => $email); // serializes object into JSON
    }
}
