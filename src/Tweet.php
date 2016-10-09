<?php

class Tweet {

    private $id;
    private $userId;
    private $text;
    private $creationDate;

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

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
            //insert nowegotweeta do bazy danych
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
        $sql = "SELECT * FROM Tweet WHERE id=$id order by id desc";
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $loadedTweet = new Tweet();
            $loadedTweet->id = $row['id'];
            $loadedTweet->userId = $row['userId'];
            $loadedTweet->text = $row['text'];
            $loadedTweet->creationDate = $row['creationDate'];
            return $loadedTweet;
        }
        return null;
    }

    static public function loadAllTweets(mysqli $connection) {

        $sql = "SELECT * FROM Tweet inner join User on Tweet.userId = User.id order by Tweet.id desc";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }
    
    static public function loadAllTweetsByUserId(mysqli $connection) {

        $sql = "SELECT * FROM Tweet WHERE userId=$userId order by id desc";
        $ret = [];
        $result = $connection->query($sql);
        if ($result == true && $result->num_rows != 0) {
            foreach ($result as $row) {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $ret[] = $loadedTweet;
            }
        }
        return $ret;
    }
    

}
