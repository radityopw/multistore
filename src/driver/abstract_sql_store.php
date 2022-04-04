<?php
namespace com\radityopw\multistore;

class AbstractSqlStore extends AbstractStore {
	abstract public function generateSql(string $key, array $value);
}