<?php

namespace Knutte\Database;

class Database implements \Anax\Common\ConfigureInterface
{
    use \Anax\Common\ConfigureTrait;

    private $pdo;



    /**
     * Execute SQL with optional parameters.
     * @param  string $sql    Statement to execute.
     * @param  array  $params Values to match ? in statement.
     * @return PDOStatementHandler
     */
    public function execute($sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        if (!$sth) {
            $this->statementException($sth, $sql, $params);
        }

        $status = $sth->execute($params);
        if (!$status) {
            $this->statementException($sth, $sql, $params);
        }
        return $sth;
    }


    /**
     * Do SELECT with optional parameters and return a resultset.
     * @param  string $sql    Statement to execute.
     * @param  array  $params Parameters to match ? in statement.
     * @return array with resultset.
     */
    public function executeFetchAll($sql, $params = [])
    {
        $sth = $this->execute($sql, $params);
        $res = $sth->fetchAll();
        if ($res === false) {
            $this->statementException($sth, $sql, $params);
        }
        return $res;
    }


    private function statementException($sth, $sql, $params)
    {
        throw new \Exception(
            $sth->errorInfo()[2]
            . "<br><br>SQL ("
            . substr_count($sql, "?")
            . " params):<br><pre>$sql</pre><br>PARAMS ("
            . count($params)
            . "):<br><pre>"
            . implode($params, "\n")
            . "</pre>"
            . ((count(array_filter(array_keys($params), 'is_string')) > 0)
                ? "WARNING your params array has keys, should only have values."
                : null)
        );
    }


    /**
     * Connect to database.
     * @param  array $config Array with options for connecting.
     * @return void
     */
    public function connect()
    {
        try {
            $this->pdo = new \PDO(...array_values($this->config));
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (Exception $e) {
            echo "Could not connect to database.<br>$e";
        }
    }


    /**
     * Add a user to the database.
     * @param string $username Username.
     * @param string $pass     Encrypted password.
     */
    public function addUser($username, $password, $email)
    {
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?);";
        self::execute($sql, [$username, $password, $email]);
    }


    /**
     * Return hashed user password.
     * @param  string $username Username of user.
     * @return Hashed password.
     */
    public function getHash($username)
    {
        $sql = "SELECT password FROM users WHERE username=?;";
        $res = self::executeFetchAll($sql, [$username]);
        return $res[0]->password;
    }


    /**
     * Return user rights.
     * @param  string $username Username of user.
     * @return Rights of user.
     */
    public function getRights($username)
    {
        $sql = "SELECT rights FROM users WHERE username=?;";
        $res = self::executeFetchAll($sql, [$username]);
        return $res[0]->rights;
    }

    /**
     * Get data from user with $id on column $column.
     * @param  string $username     Username of user.
     * @param  string $column Name of table column.
     * @return Data from column on row.
     */
    public function getUserData($username, $column)
    {
        if (self::exists($username)) {
            $sql = "SELECT $column FROM users WHERE username=?";
            $res = self::executeFetchAll($sql, [$username]);
            return $res[0]->$column;
        }
    }

    public function setUserData($username, $column, $value)
    {
        if (self::exists($username)) {
            $sql = "UPDATE users SET $column=? WHERE username=?";
            self::execute($sql, [$value, $username]);
        }
    }

    /**
     * Change the password of a user.
     * @param  string $username Username of user
     * @param  string $pass     New hashed password
     * @return void
     */
    public function changePassword($username, $password)
    {
        $sql = "UPDATE users SET password=? WHERE username=?;";
        self::execute($sql, [$password, $username]);
    }


    public function deleteUser($username)
    {
        $sql = "DELETE FROM users WHERE username=?";
        self::execute($sql, [$username]);
    }


    /**
     * Check if user with $username exists in the database.
     * @param  string $username Username of user.
     * @return Boolean value if user exists.
     */
    public function exists($username)
    {
        $sql = "SELECT * FROM users WHERE username=?;";
        $res = self::executeFetchAll($sql, [$username]);

        return isset($res[0]);
    }
}
