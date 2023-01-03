<?php
class connection extends PDO
{
    private $server;
    private $port;
    private $user;
    private $password;
    private $database;

    public function __construct($server, $port, $user, $password, $database)
    {
        $this->server = $server;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        try {
            parent::__construct(
                "mysql:host=$this->server:$this->port;dbname=$this->database;charset=utf8",
                $this->user,
                $this->password
            );
        } catch (PDOException $err) {
            die("<p><H3>No se ha podido establecer la conexión.
			<P>Compruebe si está activado el servidor de bases de
			datos MySQL.</H3></p>\n <p>Error: " . $err->getMessage() .
                "</p>\n");
        }
    }

    public function makePreparedQuery($query_text, $params=[])
    {
        $query = $this->prepare($query_text);
        // var_dump($query);
        $query->execute($params);
        if (!$query) {
            $err = $this->errorInfo();
            print "<p>Error en la consulta. Error " . $err[2] . "</p>";
        } else return $query->fetchAll();
    }
}