<?php

namespace App;

class Db    //Улучшаем класс Db.
{
    protected $dbh;
    protected $cfg;
    protected $dsn;

    public function __construct()
    {
        $this->cfg = Config::instance();
        $this->dsn = 'mysql:host=' . $this->cfg->data['db']['host'] . ';dbname=' . $this->cfg->data['db']['dbname'];
        try { //попробуй установить соединение с БД
            $this->dbh = new \PDO($this->dsn, $this->cfg->data['db']['username'], $this->cfg->data['db']['password']);
        } catch (\PDOException $error) {
            throw new DbException('Ошибка соединения с базой данных');
        }
    }

    public function query( string $sql, string $class, array $data = [] ) //Добавляем в метод возможность передавать подстановку в запрос
    {
        $sth = $this->dbh->prepare($sql);

        if (false === $sth) {
            throw new DbException('Ошибка подготовки запроса');
        }
        if ( $sth->execute($data) ) {
            return $sth->fetchAll( \PDO::FETCH_CLASS, $class );
        }
    }

    public function execute( string $query, array $params = [] ) //Добавляем описание метода execute( $query, $params = [] )
    {
        $sth = $this->dbh->prepare($query);

        if (false === $sth) {
            throw new DbException('Ошибка подготовки запроса');
        }
        if ( !$sth->execute($params) ) {
            throw new DbException('Ошибка запроса из базы данных');
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId(); //возвратит id последней вставленной записи
    }
}