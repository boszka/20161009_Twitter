<?php

class Tweet {

    private $id;
    private $userId;
    private $text;
    private $creationDate;
    private $username;

    public function __construct() {

        $this->id = -1;
        $this->userId = "";
        $this->text = "";
        $this->creationDate = "";
    }

    public function getId() {
        return $this->id;
    }

    public function setUserId($NewUserId) {
        $this->userId = $NewUserId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setText($newText) {
        $this->text = $newText;
    }

    public function getText() {
        return $this->text;
    }

    public function setCreationDate($NewCreationDate) {
        $this->creationDate = $NewCreationDate;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
            //insert nowego tweeta do bazy danych
            $sql = "INSERT INTO Tweet(userId, text, creationDate) VALUES ('$this->userId', '$this->text', '$this->creationDate')";
            $result = $connection->query($sql);
            if ($result == true) {
                $this->id = $connection->insert_id;
                return true;
            } else {
                $sql = "UPDATE Tweet SET userId='$this->userId', text='$this->text', creationDate='$this->creationDate' WHERE id=$this->id";
                $result = $connection->query($sql);
                if ($result == true) {
                    return true;
                }
            }
            return false;
        }
    }

    /**
     * 
     * @param mysqli $connection
     * @param type $id
     * @return \User
     */
    static public function loadTweetById(mysqli $connection, $id) {
        $sql = "SELECT Tweet.*, User.username FROM Tweet, User WHERE Tweet.userId = User.id AND Tweet.id=$id order by Tweet.id desc";
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedTweetById = new Tweet();
            $loadedTweetById->id = $row['id'];
            $loadedTweetById->userId = $row['userId'];
            $loadedTweetById->text = $row['text'];
            $loadedTweetById->creationDate = $row['creationDate'];
            $loadedTweetById->username = $row['username'];
            return $loadedTweetById;
        }
        return null;
    }

    static public function loadAllTweets(mysqli $connection) {

        $sql = "SELECT Tweet.*, User.username FROM Tweet, User WHERE Tweet.userId = User.id order by Tweet.id desc";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $loadedTweet->username = $row['username'];
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }
    
    static public function loadAllTweetsByUserId(mysqli $connection, $userId) {

        $sql = "SELECT Tweet.*, User.username FROM Tweet, User WHERE Tweet.userId = User.id AND userId=$userId order by Tweet.id desc";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweetByUserId = new Tweet();
                $loadedTweetByUserId->id = $row['id'];
                $loadedTweetByUserId->userId = $row['userId'];
                $loadedTweetByUserId->text = $row['text'];
                $loadedTweetByUserId->creationDate = $row['creationDate'];
                $loadedTweetByUserId->username = $row['username'];
                $ret[] = $loadedTweetByUserId;
            }
        }
        return $ret;
    }
    

}
