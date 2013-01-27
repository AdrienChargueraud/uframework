<?php

namespace Model;

interface PersistenceInterface
{
	public function create($name);

	public function update($id, $name);

	public function delete ($id);
}
